<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['description', 'id'];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
