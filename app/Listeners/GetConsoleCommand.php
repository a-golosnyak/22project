<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\ConsoleOutput;

class GetConsoleCommand
{
    private $out;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->out = new ConsoleOutput();
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Artisan::call('add', ['--option' => 'foo']);
        
        $this->out->writeln('Here');
    }
}
