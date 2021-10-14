<?php

namespace App\Listeners;

use App\Events\AlbumCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAlbumCreation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AlbumCreated  $event
     * @return void
     */
    public function handle(AlbumCreated $event)
    {
        // Do not use this printing code
        // Just for example
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $albumName = $event->album->name;
        $output->writeln("Album created: $albumName");
    }
}
