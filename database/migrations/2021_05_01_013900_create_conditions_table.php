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
            $table->date('diagnosis');
            $table->string('hospital');
            $table->text('comment');
            $table->text('icon');
            $table->bigInteger('conditionsdata_id');
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
