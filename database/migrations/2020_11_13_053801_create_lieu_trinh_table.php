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
//            $table->id('dich_vu_id');
            $table->increments('lieu_trinh_id',true,true);
            $table->string('ten_lieu_trinh',200);
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
        Schema::dropIfExists('lieu_trinh');
    }
}
