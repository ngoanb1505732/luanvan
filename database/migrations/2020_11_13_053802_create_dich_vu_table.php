<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDichVuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dich_vu', function (Blueprint $table) {
            $table->increments('dich_vu_id',true,true);
            $table->string('ten_dich_vu',200);
            $table->string('trang_thai',50);
            $table->text('mo_ta')->nullable();
            $table->integer('loai_dich_vu_id')->nullable()->unsigned();
            $table->integer('lieu_trinh_id')->nullable()->unsigned();
            $table->string('anh_dai_dien',200)->nullable();
            $table->integer('gia_tien');
            $table->integer('thoi_gian');
            $table->foreign('loai_dich_vu_id')
                ->references('loai_dich_vu_id')->on('loai_dich_vu')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('lieu_trinh_id')
                ->references('lieu_trinh_id')->on('lieu_trinh')
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
        Schema::dropIfExists('dich_vu');
    }
}
