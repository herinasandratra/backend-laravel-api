<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('article_id')->default(0);
            $table->string('description')->nullable();
            $table->string('lang')->default('en');
            $table->unique(['article_id', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_articles');
    }
}
