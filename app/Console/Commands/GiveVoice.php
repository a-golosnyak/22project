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
    protected $signature = 'voice {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All animals random voice.';

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
        if(!isset($this->argument()['name'] )){
            $animals = Animal::all();

            foreach ($animals as $animal)
            {
                $item = $animals->random(1)->first();
                $this->out->writeln($item->voice);

                $animals = $animals->reject(function ($animal) use ($item){
                    return $animal->id === $item->id;
                });
            }
        }
        else{
            $animal = Animal::where('name', $this->argument()['name'])->get();
            if(count($animal)<1){
                $this->out->writeln('We do not have animal with name ' . $this->argument()['name']);
            }
            else {
                $this->out->writeln($animal[0]->voice);
            }
        }



    }
}
