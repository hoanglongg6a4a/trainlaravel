<?php

namespace App\Models\DoAn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisp extends Model
{
    protected $fillable = ['tenLoai'];
    public $timestamps = false;
    protected $primaryKey = 'maLoai';
    protected $table = 'loaisp';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
