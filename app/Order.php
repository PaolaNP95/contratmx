<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Service;
use App\User;

class Order extends Model
{
    use Notifiable;
    protected $fillable = [
        'type', 'user_id','add_details','status'
    ];
    public function user()
    {
        return $this
            ->belongsTo('App\User');
    }
    public function services()
    {
        return $this
            ->belongsToMany('App\Service')
            ->withTimestamps();
    }
    public function budget()
    {
        return $this
            ->hasOne('App\Budget');
    }
}
