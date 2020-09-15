<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    public function item()
    {
        return $this
            ->belongsTo('App\Item');
    }
    public function user()
    {
        return $this
            ->belongsTo('App\User');
    }
}
