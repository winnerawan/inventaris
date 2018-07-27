<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public function items()
    {
        return $this->hasMany(Item::class, 'item_id');
    }
}
