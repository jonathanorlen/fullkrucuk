<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('role');
            $table->enum('status', ['1', '0'])->default(1);
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birth_date');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('status');
            $table->dropColumn('role');
            $table->dropColumn('deleted_at');
        });
    }
}
