<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\Models\Album;
use App\Models\User;

class AlbumTest extends DuskTestCase
{

    use DatabaseMigrations;

    public function testIndex()
    {
        Album::create([
            "name" => "Album 2",
            "description" => "description",
            "tracks" => ["track1", "track2"]
        ]);
        Album::create([
            "name" => "Album 1",
            "description" => "description",
            "tracks" => ["track1", "track2", "track3"]
        ]);
        $this->browse(function (Browser $browser) {
            $browser->visit(route("albums.index"));
            $this->assertEquals(2, count($browser->elements(".album")));
            foreach(Album::all() as $album){
                $browser->assertSee($album->name);
            }
        });
    }

    public function testCreate() {
        $user = User::create([
            'name' => "Miguel",
            'email' => "miguel@mail.com",
            'password' => bcrypt("password"),
        ]);
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::first())
                    ->visit(route("user.albums.create"))
                    ->assertUrlIs(route("user.albums.create"))
                    ->type("name", "Album 1")
                    ->type("description", "a desc")
                    ->type("tracks[]", "track 1")
                    ->press("Submit")
                    ->assertUrlIs(route("albums.index"))
                    ->assertSee("Album 1");
        });
    }

    public function testCreateTracks() {
        $user = User::create([
            'name' => "Miguel",
            'email' => "miguel@mail.com",
            'password' => bcrypt("password"),
        ]);
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::first())
                    ->visit(route("user.albums.create"))
                    ->assertUrlIs(route("user.albums.create"))
                    ->type("name", "Album 1")
                    ->type("description", "a desc")
                    ->click(".add")
                    ->pause(1000);
            $inputs = $browser->elements('input[name^="tracks["]');
            foreach ($inputs as $key => $input) {
                $input->sendKeys("track $key");
            }
            $browser->press("Submit")
                    ->assertUrlIs(route("albums.index"))
                    ->assertSee("Album 1")
                    ->pause(5000);
        });
    }
}
