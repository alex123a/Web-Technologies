<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\Models\Artist;
use App\Models\User;

class AlbumTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreate() {
        $user = User::create([
            'name' => "Miguel",
            'email' => "miguel@mail.com",
            'password' => bcrypt("password"),
        ]);
        $artist = Artist::create(["name" => "Artist test"]);
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::first())
                    ->visit(route("albums.index"))
                    ->press(".link-create")
                    ->assertUrlIs(route("albums.create"))
                    ->type("name", "Album 1")
                    ->type("year", "1990")
                    ->select("artist", Artist::first()->id)
                    ->radio("type", 1)
                    ->type("description", "a desc")
                    ->type("tracks[]", "track 1")
                    ->press("Submit")
                    ->assertUrlIs(route("albums.index"))
                    ->assertSee("Album 1")
                    ->assertSee("Album Album 1 successfully created");

        });
    }
}
