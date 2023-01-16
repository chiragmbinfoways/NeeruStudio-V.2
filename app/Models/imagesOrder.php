<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagesOrder extends Model
{
    use HasFactory;
    protected $table = "order_images";
    protected $guarded = [];
    
    use HasFactory;
}
