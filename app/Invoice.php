<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use App\Invoice_detail;
use Spatie\Permission\Traits\HasRoles;


class Invoice extends Model
{
    use HasRoles;
    protected $fillable = [
        'customer_id', 'total',
    ];

    public function getTotalPriceAttribute()
    {

        return ($this->total - (($this->total * 2) / 100));
    }

    public function getdiscountAttribute()
    {   //2% discount
        return ($this->total - (($this->total * 0.98)));
    }

    //DEFINE RELATIONSHIPS
    public function customer()
    {
        //Invoice reference ke table customers
        return $this->belongsTo(Customer::class);
    }

    public function detail()
    {
        return $this->hasMany(Invoice_detail::class);
    }
}
