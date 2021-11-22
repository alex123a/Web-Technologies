<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Album;
use App\Models\User;

class AlbumTest extends TestCase
{
    use RefreshDatabase;
    public function testIndex()
    {
        $response = $this->get(route("albums.index"));
        $response->assertOk();
    }

    public function testCreate() {
        $this->assertEquals(0, count(Album::all()));
        $response = $this->post(route("albums.store"),[
            "name" => "Album 1",
            "description" => "description",
            "tracks" => ["track1", "track2"]
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route("albums.index"));
        $this->assertEquals(1, count(Album::all()));

        $this->assertDatabaseHas("albums", ["name" => "Album 1"]);
    }

    public function testNoUserCreate() {
        $this->assertEquals(0, count(Album::all()));
        $data = [
            "name" => "Album 1",
            "description" => "description",
            "tracks" => ["track1", "track2"]
        ];
        $response = $this->post(route("user.albums.store"), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route("login"));
        $this->assertEquals(0, count(Album::all()));
    }

    public function testUserCreate() {
        $this->assertEquals(0, count(Album::all()));
        $user = User::create([
            'name' => "Miguel",
            'email' => "miguel@mail.com",
            'password' => bcrypt("password"),
        ]);
        $data = [
            "name" => "Album 1",
            "description" => "description",
            "tracks" => ["track1", "track2"]
        ];
        $response = $this->actingAs($user)->post(route("user.albums.store"), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route("albums.index"));
        $this->assertEquals(1, count(Album::all()));
    }

    public function testNoUserCreateWithoutMiddleware() {
        $this->withoutMiddleware();
        $this->assertEquals(0, count(Album::all()));
        $data = [
            "name" => "Album 1",
            "description" => "description",
            "tracks" => ["track1", "track2"]
        ];
        $response = $this->post(route("user.albums.store"), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route("albums.index"));
        $this->assertEquals(1, count(Album::all()));
    }
}
