<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->mediumText('body');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('status');
            $table->string('slug');
            $table->integer('tag_id');
            $table->boolean('confirmed');
            $table->integer('views');
            $table->string('featuredImage')->nullable();
            $table->string('metaTitle')->nullable();
            $table->string('metaDescription')->nullable();
            $table->text('metaKeywords')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
