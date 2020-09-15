<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    public function order()
    {
        return $this
            ->belongsTo('App\Order');
    }
    public function item()
    {
        return $this->belongsToMany('App\Item')->as('selected')->withPivot('quantity');
    }
}
