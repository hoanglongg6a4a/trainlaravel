<?php

namespace App\Models\DoAn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['TenSP','soLuongSP','hinh','maLoai','maNSX','maNCC','gia','baohanh','description','detailProduc'];
    public $timestamps = false;
    protected $primaryKey = 'maSP';
    protected $table = 'sanpham';

    public function loaisp()
    {
        return $this->belongsTo(loaisp::class,'maLoai','maLoai');
    }
}
