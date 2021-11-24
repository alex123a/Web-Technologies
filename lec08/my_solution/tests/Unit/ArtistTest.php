<?php

namespace Tests\Unit;

use App\Models\albums;
use App\Models\artists;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $artist = new artists();
        $artist->name = "test artist2";
        $artist->save();
        $artist->refresh();

        $album = new albums();
        $album->name = "testAlbumName222";
        $album->year = "2000";
        $album->type = "single";
        $album->description = "test description";
        $album->tracks = ["sejsang1", "sejsang2", "sejsang3", "sejsang4"];
        $album->artists()->associate($artist);
        $album->save();
        $artist->refresh();

        $album = new albums();
        $album->name = "testAlbumName2222";
        $album->year = "2000";
        $album->type = "single";
        $album->description = "test description2";
        $album->tracks = ["sejsang1", "sejsang2", "sejsang3"];
        $album->artists()->associate($artist);
        $album->save();
        $artist->refresh();
        print($artist->amountOfAlbums()." fuuuuck");


        $this->assertEquals($artist->amountOfAlbums(), 2);
    }
}
