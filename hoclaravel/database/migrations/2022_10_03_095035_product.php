<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id_sanpham');
            $table->string('TenSP');
            $table->integer('Gia');
            $table->integer('soLuong');
            $table->string('Mota');
            $table->string('ctSanPham');
            $table->string('hinh');
            $table->integer('maLoai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};


// protected $fillable = ['TenSP','Gia','soLuong','Mota','ctSanPham','hinh','maLoai'];
// public $timestamps = false;
// protected $primaryKey = 'id_sanpham';
// protected $table = 'Product';
