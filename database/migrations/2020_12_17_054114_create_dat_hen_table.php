<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatHenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dat_hen', function (Blueprint $table) {
            $table->increments('dat_hen_id', true, true);
            $table->integer('phieu_dat_cho_id')->nullable()->unsigned();
            $table->integer('dich_vu_id')->nullable()->unsigned();


            $table->foreign('phieu_dat_cho_id')
                ->references('phieu_dat_cho_id')->on('phieu_dat_cho')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('dat_hen');
    }
}
