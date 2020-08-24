<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Product extends Model
{
    //use HasRoles;

    //protected $guarded = [];
    protected $fillable = ['title', 'description', 'sell_price', 'cost_price', 'stock'];
}
