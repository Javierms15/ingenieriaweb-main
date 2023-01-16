<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Advertisement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('advertisements',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('address', 100);
            $table->unsignedInteger('capacity');
            $table->date('date');
            $table->longText('features');
            $table->json('images');
            $table->string('other', 120);
            $table->unsignedDecimal('price');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('failed_at')->useCurrent();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
