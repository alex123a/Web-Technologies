<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    
    protected $casts = ["tracks" => "json"];

    protected $dispatchesEvents = [
        'created' => \App\Events\AlbumCreated::class,
    ];
    
    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    public function toArray() {
        $array = parent::toArray();
        $array["artist"] = $this->artist()->first();
        return $array;
    }
}
