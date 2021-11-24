<?php

namespace Tests\Unit;

use App\Models\albums;
use App\Models\artists;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlbumTest extends TestCase {
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_number_of_tracks() {
        $artist = new artists();
        $artist->name = "test artist";
        $artist->save();
        $artist->refresh();

        $album = new albums();
        $album->name = "testAlbumName";
        $album->year = "2000";
        $album->type = "single";
        $album->description = "test description";
        $album->tracks = ["sejsang1", "sejsang2", "sejsang3", "sejsang4"];
        $album->artists()->associate(1);
        $album->save();
        $artist->refresh();


        $this->assertEquals($album->amountOfTracks(), 4);
    }
}
