<?php

namespace App\Models\DoAn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['TenSP','Gia','soLuong','Mota','ctSanPham','hinh','maLoai'];
    public $timestamps = false;
    protected $primaryKey = 'id_sanpham';
    protected $table = 'Product';

    public function loaisp()
    {
        return $this->belongsTo(loaisp::class,'maLoai','maLoai');
    }
}
