<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';

    protected function animals()
    {
        return $this->hasMany(Animal::class, '');
    }
}
