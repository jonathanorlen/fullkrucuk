<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('place');
            $table->string('cover', 50)->nullable();
            $table->string('menu', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('address');
            $table->string('category_id',10)->nullable();
            $table->string('price', 100)->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('phone')->length(13)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', [1, 0])->nullable()->default([0]);
            $table->string('message', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
