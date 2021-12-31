<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainmenus', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title', 50);
            $table->bigInteger('parent')->default(0);
            $table->enum('category', ['link', 'content', 'file']);
            $table->text('content')->nullable();
            $table->string('file', 100)->nullable();
            $table->string('url', 100)->nullable();
            $table->integer('order');
            $table->integer('status');
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
        Schema::dropIfExists('main_menus');
    }
}
