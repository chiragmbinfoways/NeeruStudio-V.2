<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMeasurementTable extends Migration
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
            $table->foreign('order_detail_id')->references('order_detail_id')->on('order_details')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('shoulder',10,2)->nullable();
            $table->decimal('length_1',10,2)->nullable();
            $table->decimal('mori',10,2)->nullable();
            $table->decimal('length_2',10,2)->nullable();
            $table->decimal('chest',10,2)->nullable();
            $table->decimal('front_neck',10,2)->nullable();
            $table->decimal('waist,10,2')->nullable();
            $table->decimal('back_neck',10,2)->nullable();
            $table->decimal('chest_up',10,2)->nullable()->nullable();
            $table->decimal('mundo',10,2)->nullable();
            $table->decimal('other',10,2)->nullable();
            $table->decimal('length(p)',10,2)->nullable();
            $table->decimal('nefo',10,2)->nullable();
            $table->decimal('seat',10,2)->nullable();
            $table->decimal('gher',10,2)->nullable();
            $table->decimal('kali',10,2)->nullable();
            $table->decimal('other(p)')->nullable();           
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
        Schema::dropIfExists('order_measurement');
    }
}
