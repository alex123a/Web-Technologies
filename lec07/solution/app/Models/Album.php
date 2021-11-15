<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    
    protected $casts = ["tracks" => "json"];

    protected $fillable = [
        'name',
        "year",
        "type",
        'description',
        'tracks',
        "artist_id"
    ];

    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    public function amountOfTracks() {
        if($this->tracks == null)
            return 0;
        return count($this->tracks);
    }
}
