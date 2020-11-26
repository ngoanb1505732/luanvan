<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->increments('khach_hang_id',true,true);

//            $table->id('khach_hang_id');
            $table->string('ho_ten',50);
            $table->string('dia_chi',200)->nullable();
            $table->string('sdt',20)->nullable();
            $table->string('username',50);
            $table->string('password',50);
            $table->date('ngay_sinh')->nullable();
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
        Schema::dropIfExists('khach_hang');
    }
}
