<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'discount_price',
        'image',
        'rating',
        'reviews_count',
        'description',
        'badge',
        'in_stock',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'discount_price' => 'decimal:2',
            'rating' => 'decimal:1',
            'in_stock' => 'boolean',
        ];
    }
}
