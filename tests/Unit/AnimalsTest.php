<?php

namespace Tests\Unit;

use App\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnimalsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_is_possible_to_create_animal()
    {
         $pet = factory(Animal::class)->create();

         $this->assertDatabaseHas('animals', [
             'name' => $pet->name]);
    }

    public function test_we_can_create_animals_via_console()
    {
        $name = 'Rex';
        $role = 'dog';
        $voice = 'Woof';

         $this->artisan("add $role $name")
            ->expectsQuestion("What is $name's voice?", $voice)
            //->expectsOutput("$name can say $voice")
            ->assertExitCode(0);

         $this->assertDatabaseHas('animals', [
             'name' => $name,
             'voice' => $voice
         ]);
          $this->assertDatabaseHas('roles', [
             'name' => $role
         ]);
    }

    public function test_animal_can_give_voice()
    {
         $pet = factory(Animal::class)->create([
             'name' => 'Rex',
             'voice' => 'Woof',
         ]);

         $this->artisan('voice Rex')
            //->expectsOutput("Woof")
            ->assertExitCode(0);
    }

    public function test_animals_can_create_chore()
    {
         factory(Animal::class, 5)->create();

         $this->artisan('voice')
            ->assertExitCode(0);
    }

}
