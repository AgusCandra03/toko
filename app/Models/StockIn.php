<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;

    protected $fillable = ['nota', 'product_id', 'supplier_id', 'qty', 'price'];

    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function suppliers()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }
}
