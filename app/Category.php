<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function stuffs()
    {
        return $this->hasMany(Stuff::class, 'category_id');
    }
}
