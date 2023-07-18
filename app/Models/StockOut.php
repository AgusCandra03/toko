<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'qty', 'description'];

    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
