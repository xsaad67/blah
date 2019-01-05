<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heading');
            $table->string('slug')->nullable();
            $table->boolean('isLink')->default(0);
            $table->boolean('isBlog')->default(0);
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->integer('listCount')->default(0);
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
        Schema::dropIfExists('parent_lists');
    }
}
