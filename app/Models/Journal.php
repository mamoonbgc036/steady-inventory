<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'type',
        'amount',
        'description'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
