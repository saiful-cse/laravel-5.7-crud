<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'coffee_name',
        'coffee_desc',
        'coffee_price'
    ];
}
