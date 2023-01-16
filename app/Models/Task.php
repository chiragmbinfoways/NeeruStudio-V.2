<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = "table_task_detail";
    protected $guarded = [];

    public function orderDetails(){
        return $this->hasOne(OrderDetails::class,'id','order_detail_id');
    } 
    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
