<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artists extends Model
{
    use HasFactory;

    public function album() {
        return $this->hasMany(albums::class);
    }

    public function amountOfAlbums() {
        $counter = 0;
        $albums = albums::all();
        foreach ($albums as $album) {
            $album["artist"] = artists::find($album["artists_id"])["id"];
            if ($album["artist"] == $this->id) {
                $counter++;
            }
        }

        return $counter;
    }
}
