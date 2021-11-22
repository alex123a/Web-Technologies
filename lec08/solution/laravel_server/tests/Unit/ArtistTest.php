<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Artist;
use App\Models\Album;

class ArtistTest extends TestCase
{
    use RefreshDatabase;

    public function testCountTrack() {
        $artist = Artist::create(["name" => "Artist test"]);
        $this->assertEmpty(0, $artist->amountOfAlbums());

        Album::create([
            'name' => "Album 1",
            "year" => 1990,
            "type" => 1,
            'description' => "a desc",
            'tracks' => ["t1", "t2"],
            "artist_id" => $artist->id
        ]);
        $artist->refresh();
        $this->assertEquals(1, $artist->amountOfAlbums());

        Album::create([
            'name' => "Album 2",
            "year" => 1992,
            "type" => 1,
            'description' => "a desc 2",
            'tracks' => ["t1"],
            "artist_id" => $artist->id
        ]);
        $artist->refresh();
        $this->assertEquals(2, $artist->amountOfAlbums());
    }
}
