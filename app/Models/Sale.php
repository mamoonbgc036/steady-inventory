<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'discount',
        'vat',
        'total_amount',
        'paid_amount',
        'due_amount'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
}
