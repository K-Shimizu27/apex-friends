<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("game_id");
            $table->string("rank");
            $table->double("kd",2);
            $table->integer("damage");
            $table->integer("platform");
            $table->string("character");
            $table->timestamps();
            
            //外部キー制約
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
        Schema::table('game_profiles', function (Blueprint $table) {
            //外部キー制約削除
            $table->dropForeign(['user_id']);
            
            $table->dropIfExists('game_profiles');
        });
    }
};
