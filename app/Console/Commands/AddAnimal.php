<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class AddAnimal extends Command
{
    private $out;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add {animal} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding new animal';

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
        $this->out->writeln('Here ' . $this->argument()['animal'] . ' ' . $this->argument()['name']);
        $voice = $this->ask('What is ' . $this->argument()['name'] . '\'s voice?');
        $this->out->writeln($this->argument()['name'] . ' can say ' . $voice);
    }
}
