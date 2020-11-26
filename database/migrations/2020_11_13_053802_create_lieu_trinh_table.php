<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLieuTrinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lieu_trinh', function (Blueprint $table) {
            $table->increments('lieu_trinh_id',true,true);
            $table->string('ten_lieu_trinh',200);
            $table->string('trang_thai',50);
            $table->text('mo_ta')->nullable();
            $table->integer('dich_vu_id')->nullable()->unsigned();
            $table->string('anh_dai_dien',200)->nullable();
            $table->integer('gia_tien');
            $table->integer('thoi_gian');
            $table->foreign('dich_vu_id')
                ->references('dich_vu_id')->on('dich_vu')
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
        Schema::dropIfExists('lieu_trinh');
    }
}
