<?php

namespace App\Console\Commands;

use App\Animal;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class GiveVoice extends Command
{
    private $out;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voice {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Allow animal to say.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->out = new ConsoleOutput();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $animal = Animal::where('name', $this->argument()['name'])->get();

        if(count($animal)<1){
            $this->out->writeln('We do not have animal with name ' . $this->argument()['name']);
        }
        else {
            $this->out->writeln($animal[0]->voice);
        }
    }
}
