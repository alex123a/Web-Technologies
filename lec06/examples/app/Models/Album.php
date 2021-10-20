<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Artist;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    // protected $dispatchesEvents = [
    //     'created' => \App\Events\AlbumCreated::class,
    // ];

}