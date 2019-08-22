<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleryimages', function (Blueprint $table) {
            $table->increments('image_id');
            $table->timestamps();
            $table->string('image_title', 255);
            $table->string('image_path', 255);
            $table->tinyint('status', 1);
            $table->tinyint('gallery_cover', 1);
            $table->integer('order');
            $table->integer('gallery_id')->unsigned()->index()->nullable();
            $table->foreign('gallery_id')->references('id')->on('galleries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleryimages');
    }
}
