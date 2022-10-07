<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['TenSP', 'Gia', 'Mota'];
    public $timestamps = false;
    protected $primaryKey = 'id_sanpham';
    protected $table = 'Product';
}
