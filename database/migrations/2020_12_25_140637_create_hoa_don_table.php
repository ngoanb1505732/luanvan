<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->increments('hoa_don_id', true, true);
            $table->integer('phieu_dat_cho_id')->nullable()->unsigned();
            $table->integer('nhan_vien_id')->nullable()->unsigned();
            $table->integer('khach_hang_id')->nullable()->unsigned();

            $table->foreign('phieu_dat_cho_id')
                ->references('phieu_dat_cho_id')->on('phieu_dat_cho')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('hoa_don');
    }
}
