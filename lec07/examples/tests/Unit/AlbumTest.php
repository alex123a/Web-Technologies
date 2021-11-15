<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Album;

class AlbumTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void{
        parent::setUp();
    }

    public function testExample(){
        $this->assertTrue(true);
    }

    public function testCountTrack() {
        $album = new Album();
        $this->assertEmpty($album->tracks);

        $album->tracks = ["track1", "track2"];
        $this->assertEquals(2, $album->numberOfTracks());
        // $this->assertEquals(3, $album->numberOfTracks());
        // $this->assertEquals(3, $album->numberOfTracks(), $message="error when countring tracks");
    }

    public function testMake() {
        $album = Album::make([
            "name" => "Album 1",
            "description" => "description",
            "tracks" => ["track1", "track2"]
        ]);

        $this->assertEquals("Album 1", $album->name);
        $this->assertEquals(2, $album->numberOfTracks());
    }

    public function testCreate() {
        $album = Album::create([
            "name" => "Album 1",
            "description" => "description",
            "tracks" => ["track1", "track2"]
        ]);

        $this->assertEquals("Album 1", $album->name);
        $this->assertEquals(2, $album->numberOfTracks());

        $this->assertEquals(1, count(Album::all()));
    }

    public function tearDown() : void{
        parent::tearDown();
    }
}
