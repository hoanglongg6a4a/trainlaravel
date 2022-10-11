<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['maNV','ngayMua','tinhTrang'];
    public $timestamps = false;
    protected $primaryKey = 'maPX';
    protected $table = 'phieuxuat';
}
