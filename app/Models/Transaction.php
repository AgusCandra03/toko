<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'total'];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function transaction_details()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'transaction_id');
    }
}
