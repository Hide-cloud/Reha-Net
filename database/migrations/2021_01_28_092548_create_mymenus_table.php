<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMymenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mymenus', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('favorite_menu_id');
            $table->string('title');
            $table->string('disease')->nullable();
            $table->string('keyword')->nullable();
            $table->string('item')->nullable();
            $table->string('method');
            $table->string('youtube_url')->nullable();
            $table->string('video_path')->nullable();
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
        Schema::dropIfExists('mymenus');
    }
}
