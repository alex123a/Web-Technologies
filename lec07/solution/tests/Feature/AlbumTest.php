<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Artist;
use App\Models\Album;
use App\Models\User;

class AlbumTest extends TestCase
{
    use RefreshDatabase;
    
    public function testNoUserCreateWithoutMiddleware(){
        $this->withoutMiddleware();

        $artist = Artist::create(["name" => "Artist test"]);
        $data = [
            'name' => "Album 1",
            "year" => 1990,
            "type" => 1,
            'description' => "a desc",
            "tracks" => "t1",
            "tracks" => "t2",
            "artist" => $artist->id
        ];
        $response = $this->post(route("albums.store"), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route("albums.index"));
        $this->assertEquals(1, count(Album::all()));
    }

    public function testUserCreate(){
        $user = User::create([
            'name' => "Miguel",
            'email' => "miguel@mail.com",
            'password' => bcrypt("password"),
        ]);
        $artist = Artist::create(["name" => "Artist test"]);
        $data = [
            'name' => "Album 1",
            "year" => 1990,
            "type" => 1,
            'description' => "a desc",
            "tracks" => "t1",
            "tracks" => "t2",
            "artist" => $artist->id
        ];
        $response = $this->actingAs($user)->post(route("albums.store"), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route("albums.index"));
        $this->assertEquals(1, count(Album::all()));
    }
}
