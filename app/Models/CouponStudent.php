<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponStudent extends Model
{
    use HasFactory;

    protected $table = 'coupon_student';
    protected $guarded = [];
}
