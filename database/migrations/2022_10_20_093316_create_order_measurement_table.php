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
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onUpdate('cascade')->onDelete('cascade');
            //Blowse
            $table->string('b_shoulder')->nullable();
            $table->string('b_length')->nullable();
            $table->string('b_chest')->nullable();
            $table->string('b_waist')->nullable();
            $table->string('b_chest_up')->nullable();
            $table->string('b_Sleeves')->nullable();
            $table->string('b_Sleeves')->nullable();
            $table->string('b_mundo')->nullable();
            $table->string('b_magismory')->nullable();
            $table->string('b_front_neck')->nullable();
            $table->string('b_back_neck')->nullable();
            $table->string('b_other')->nullable();
             //Kurti/Anarkali/Gaun
            $table->string('k_shoulder')->nullable();
            $table->string('k_length')->nullable();
            $table->string('k_chest')->nullable();
            $table->string('k_waist')->nullable();
            $table->string('k_chest_up')->nullable();
            $table->string('k_Sleeves')->nullable();
            $table->string('k_mori')->nullable();
            $table->string('k_mundo')->nullable();
            $table->string('k_magismory')->nullable();
            $table->string('k_front_neck')->nullable();
            $table->string('k_back_neck')->nullable();
            $table->string('k_full_length')->nullable();
            $table->string('k_kotho')->nullable();
            $table->string('k_other')->nullable();
            //Pant/Salwar/Plazo
            $table->string('p_length')->nullable();
            $table->string('p_mori')->nullable();
            $table->string('p_nefo')->nullable();
            $table->string('p_seat')->nullable();
            $table->string('p_thai')->nullable();
            $table->string('p_knee')->nullable();
            $table->string('p_other')->nullable();
            //petticoat
            $table->string('pe_length')->nullable();
            $table->string('pe_nefo')->nullable();
            $table->string('pe_seat')->nullable();
            $table->string('pe_gher')->nullable();
            $table->string('pe_typeof')->nullable();
            $table->string('pe_other')->nullable();    
            //additional items       
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
        Schema::dropIfExists('order_measurement');
    }
}
