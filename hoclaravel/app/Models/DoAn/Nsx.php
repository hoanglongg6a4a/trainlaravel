<?php

namespace App\Models\DoAn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nsx extends Model
{
    protected $fillable = ['tenNSX','quocGia'];
    public $timestamps = false;
    protected $primaryKey = 'maNSX';
    protected $table = 'NSX';
}
