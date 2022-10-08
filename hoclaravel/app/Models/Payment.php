<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['amount','OrderID','status', 'code_vnpay','id_kh'];
    public $timestamps = false;
    protected $primaryKey = 'id_payment';
    protected $table = 'payment';
}
