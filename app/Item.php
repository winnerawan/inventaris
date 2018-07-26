<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'stuff_id', 'condition_id', 'location','quantity',
    ];

    public function stuff()
    {
        return $this->belongsTo(Stuff::class, 'stuff_id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }
}
