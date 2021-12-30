<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\artists;
class albums extends Model
{
    use HasFactory;

    protected $casts = ["tracks" => "json"];

    public function artists() {
        return $this->belongsTo(artists::class);
    }

    public function amountOfTracks() {
        $tracks = $this->tracks;
        return count($tracks);
    }
}
