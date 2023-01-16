<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $guarded = [];

    public function customers(){
        return $this->hasOne(CustomerDetail::class,'id','customer_id');
    }
    public function orderDetails(){
        return $this->hasOne(OrderDetails::class,'id','order_id');
    } 
}
