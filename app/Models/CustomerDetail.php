<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    use HasFactory;
    protected $table = "customersdetails";
    protected $guarded = [];

    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
