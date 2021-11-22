<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Artist;

class Album extends Model
{
    use HasFactory;

    protected $casts = ["tracks" => "json"];
    protected $fillable = [
        'name',
        'description',
        'tracks',
    ];

    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    public function numberOfTracks() {
        return count($this->tracks);
    }
}
