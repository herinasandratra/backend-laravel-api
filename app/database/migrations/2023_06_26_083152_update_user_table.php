<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('language')->default('en');
            $table->string('birthdate')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('city');
            $table->dropColumn('address');
            $table->dropColumn('zip');
            $table->dropColumn('language');
            $table->dropColumn('birthdate');
        });
    }
}
