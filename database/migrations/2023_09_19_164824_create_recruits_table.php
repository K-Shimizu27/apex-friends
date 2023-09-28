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
        Schema::create('recruits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->unique();
            $table->string("title");
            $table->string("mode");
            $table->boolean("cross_play");
            $table->boolean("play_style");
            $table->string("vc");
            $table->string("comment");
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
        Schema::table('recruits', function (Blueprint $table) {
            //外部キー制約削除
            $table->dropForeign(['user_id']);
            
            $table->dropIfExists('recruits');
        });
    }
};
