<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function users()
    {
        return $this->hasMany(User::class, 'program_id');
    }

}
