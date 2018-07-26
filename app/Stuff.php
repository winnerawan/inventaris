<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }


}
