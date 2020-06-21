<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operationals', function (Blueprint $table) {
            $table->id();
            $table->integer('merchant_id');
            $table->string('sunday', 100)->nullable();
            $table->string('monday', 100)->nullable();
            $table->string('tuesday', 100)->nullable();
            $table->string('wednesday', 100)->nullable();
            $table->string('thursday', 100)->nullable();
            $table->string('friday', 100)->nullable();
            $table->string('saturday', 100)->nullable();
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
        Schema::dropIfExists('operationals');
    }
}
