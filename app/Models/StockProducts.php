<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProducts extends Model
{
    use HasFactory;

    protected $table = 'stock_products';

    public function getProductTransactions(){
        return $this->hasMany(ProductTransactions::class);
    }

}
