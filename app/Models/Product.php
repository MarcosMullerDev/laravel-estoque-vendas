<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'purchase_price',
        'expected_sale_price',
        'sale_price',
        'transport_cost',
        'purchase_date',
        'sale_date',
        'purchase_payment',
        'sale_payment',
        'status',
        'tags',
        'notes',
        'has_defect',
    ];

    public function getProfitAttribute()
    {
        if (!$this->sale_price) {
            return 0;
        }

        return $this->sale_price
            - $this->purchase_price
            - $this->transport_cost;
    }
}