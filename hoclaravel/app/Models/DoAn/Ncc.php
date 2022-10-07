<?php

namespace App\Models\DoAn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ncc extends Model
{
    protected $fillable = ['tenNCC', 'diaChi', 'sdt'];
    public $timestamps = false;
    protected $primaryKey = 'maNCC';
    protected $table = 'NCC';
}
