<?php

namespace App\Models\DoAn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['maKH','maSP','soLuongSP'];
    public $timestamps = false;
    protected $table = 'cart';
}
