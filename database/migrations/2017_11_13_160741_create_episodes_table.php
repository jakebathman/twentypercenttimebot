<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->string('guid')->nullable()->unique();
            $table->dateTime('pubDate')->nullable();
            $table->string('author')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('url')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file_url')->nullable();
            $table->unsignedInteger('length_bytes')->nullable();
            $table->time('duration')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
