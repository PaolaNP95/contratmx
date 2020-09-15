<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    protected $table = 'budget_item';
    protected $fillable = [
        'quantity', 'item_id','budget_id'
    ];
}
