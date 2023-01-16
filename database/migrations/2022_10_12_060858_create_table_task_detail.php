<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTaskDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_task_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_detail_id')->unsigned()->nullable();
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onUpdate('cascade')->onDelete('cascade');
            $table->Integer('user_id')->nullable();
            $table->enum('status',['1','0'])->default('0');
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
        Schema::dropIfExists('table_task_detail');
    }
}
