<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiDichVuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_dich_vu', function (Blueprint $table) {
//            $table->id('dich_vu_id');
            $table->increments('loai_dich_vu_id',true,true);
            $table->string('ten_loai_dich_vu',200);
            $table->text('dien_giai')->nullable();
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
        Schema::dropIfExists('loai_dich_vu');
    }
}
