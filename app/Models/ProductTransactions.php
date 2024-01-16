<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransactions extends Model
{
    use HasFactory;

    protected $table = 'product_transactions';

    public function getProduct(){
        return $this->belongsTo('App\Models\StockProducts','product_id','id');
    }
}
