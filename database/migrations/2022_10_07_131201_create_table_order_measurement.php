<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderMeasurement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('order_measurement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_detail_id')->unsigned()->nullable();
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onUpdate('cascade')->onDelete('cascade');
            $table->string('shoulder')->nullable();
            $table->string('length_1')->nullable();
            $table->string('mori')->nullable();
            $table->string('length_2')->nullable();
            $table->string('chest')->nullable();
            $table->string('front_neck')->nullable();
            $table->string('waist')->nullable();
            $table->string('back_neck')->nullable();
            $table->string('chest_up')->nullable()->nullable();
            $table->string('mundo')->nullable();
            $table->string('other')->nullable();
            $table->string('length_peticoat')->nullable();
            $table->string('nefo')->nullable();
            $table->string('seat')->nullable();
            $table->string('gher')->nullable();
            $table->string('kali')->nullable();
            $table->string('other_peticoat')->nullable();           
            $table->string('remarks')->nullable();           
            $table->enum('huk',['1','0'])->default('0');
            $table->enum('pad',['1','0'])->default('0');
            $table->enum('sample',['1','0'])->default('0');
            $table->enum('design',['1','0'])->default('0');
            $table->bigInteger('added_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_order_measurement');
    }
}
