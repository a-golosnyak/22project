<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table='animals';

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
