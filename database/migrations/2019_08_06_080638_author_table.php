<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->string('designation', 100);
            $table->string('dob', 100);
            $table->string('email')->unique();
            $table->string('phone', 50)->nullable();
            $table->string('country', 100);
            $table->text('description')->nullable();
            $table->string('author_feature', 100)->nullable();
            $table->string('facebook_id', 100)->unique();
            $table->string('twitter_id', 100)->unique();
            $table->string('youtube_id', 100)->unique();
            $table->string('pinterest_id', 100)->unique();
            $table->string('author_img');
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author');
    }
}
