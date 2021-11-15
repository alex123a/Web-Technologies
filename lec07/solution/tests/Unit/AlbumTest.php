<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Album;

class AlbumTest extends TestCase
{
    public function testCountAlbums() {
        $album = new Album();
        $this->assertEmpty(0, $album->amountOfTracks());

        $album->tracks = ["track1", "track2"];
        $this->assertEquals(2, $album->amountOfTracks());
    }
}
