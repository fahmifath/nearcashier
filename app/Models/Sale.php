<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
     use HasFactory;

    protected $fillable = [
        'invoice',
        'user_id',
        'customer_id',
        'total_item',
        'discount_id',
        'total_discount',
        'grand_total',
        'paid_amount',
        'change_amount',
        'payment_method',
        'transaction_date'
    ];

    protected $casts = [
        'transaction_date' => 'datetime'
    ];

    public function cashier()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function details()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
