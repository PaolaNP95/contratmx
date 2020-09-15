<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function stock()
    {
        return $this
            ->hasMany('App\Stock');
    }
    public function category()
    {
        return $this
            ->belongsTo('App\Category');
    }
    public function departures()
    {
        return $this
            ->hasMany('App\Departure');
    }
    public function entry()
    {
        return $this
            ->hasMany('App\Entry');
    }
    public function budget()
    {
        return $this->belongsToMany('App\Budget');
    }
}
