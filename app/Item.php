<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function stuff()
    {
        return $this->belongsTo(Stuff::class, 'stuff_id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'stuff_id');
    }
}
