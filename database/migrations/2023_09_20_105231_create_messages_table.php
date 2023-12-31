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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("recruit_id");
            $table->unsignedBigInteger("user_id");
            $table->string("message");
            $table->timestamps();
            
            //外部キー制約
            $table->foreign('recruit_id')->references('id')->on('recruits');
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
        Schema::table('messages', function (Blueprint $table) {
            //外部キー制約削除
            $table->dropForeign(['user_id','recruit_id']);
            
            $table->dropIfExists('messages');
        });
    }
};
