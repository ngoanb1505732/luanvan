<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->increments('danh_gia_id', true, true);
            $table->integer('dich_vu_id')->nullable()->unsigned();
            $table->foreign('dich_vu_id')
                ->references('dich_vu_id')->on('dich_vu')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('khach_hang_id')->nullable()->unsigned();
            $table->foreign('khach_hang_id')
                ->references('khach_hang_id')->on('khach_hang')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('noi_dung');
            $table->integer('diem');
            $table->string('trang_thai');
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
        Schema::dropIfExists('danh_gia');
    }
}
