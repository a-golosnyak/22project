<?php

namespace App\Console\Commands;

use App\Animal;
use App\Role;
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
        $animal = new Animal();

        $role = Role::where('name', $this->argument()['animal'])->get();

        if(count($role)<1)
        {
            $role = new Role();
            $role->name = $this->argument()['animal'];
            $role->save();
        }
        else
            $role = $role[0];

        $animal->name = str_replace('"', '', $this->argument()['name']);
        $voice = $this->ask('What is ' . $this->argument()['name'] . '\'s voice?');
        $this->out->writeln($this->argument()['name'] . ' can say ' . $voice);
        $animal->voice = $voice;
        $animal->role_id = $role->id;
        $animal->save();
    }
}
