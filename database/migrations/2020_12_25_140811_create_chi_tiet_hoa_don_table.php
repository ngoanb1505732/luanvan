<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->increments('chi_tiet_hoa_don_id', true, true);
            $table->integer('hoa_don_id')->nullable()->unsigned();
            $table->foreign('hoa_don_id')
                ->references('hoa_don_id')->on('hoa_don')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('dich_vu_id')->nullable()->unsigned();
            $table->foreign('dich_vu_id')
                ->references('dich_vu_id')->on('dich_vu')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('so_luong')->nullable()->unsigned();
            $table->integer('gia_tien')->nullable()->unsigned();
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
        Schema::dropIfExists('chi_tiet_hoa_don');
    }
}
