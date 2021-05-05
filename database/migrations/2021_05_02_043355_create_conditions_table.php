<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('conditions')) {
            return;
        }

        Schema::create('conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start');
            $table->date('diagnosis')->nullable();
            $table->string('hospital');
            $table->text('others')->nullable();
            $table->text('comment')->nullable();
            $table->text('icon')->nullable();
            $table->string('conditiondata_name');
            $table->unsignedInteger('user_id');
            $table->string('user_name');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_name')->references('name')->on('users');
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
        Schema::dropIfExists('conditions');
    }
}
