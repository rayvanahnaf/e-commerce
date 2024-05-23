<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'addres',
        'courier',
        'payment',
        'payment_url',
        'status',
        'total_price',
    ];

    public function user(){
        return $this->belongsTo(User::class);

    }
    public function transaction_item(){
        return $this->hasMany(TransactionItem::class);
    }

}
