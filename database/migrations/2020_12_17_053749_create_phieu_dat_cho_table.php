<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuDatChoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_dat_cho', function (Blueprint $table) {
            $table->increments('phieu_dat_cho_id', true, true);
            $table->string('trang_thai',50)->nullable();
            $table->integer('khach_hang_id')->nullable()->unsigned();
            $table->integer('nhan_vien_id')->nullable()->unsigned();
            $table->timestamp('ngay_lam')->nullable();
            $table->integer('thoi_gian_lam')->nullable()->unsigned();

            $table->foreign('khach_hang_id')
                ->references('khach_hang_id')->on('khach_hang')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('nhan_vien_id')
                ->references('nhan_vien_id')->on('nhan_vien')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('phieu_dat_cho');
    }
}
