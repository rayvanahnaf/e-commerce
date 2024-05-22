<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionItem extends Model
{
    use HasFactory;
    protected $fillable=[
'transaction_id',
'product_id',
'user_id'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function transaction(){
        return $this->belongsTo(Transaction::class);

    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
