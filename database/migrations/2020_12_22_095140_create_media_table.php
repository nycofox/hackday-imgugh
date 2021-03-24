<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('path');
            $table->string('slug', '12')->unique();
            $table->string('filename_original')->nullable();
            $table->string('type', '1'); // i = image, v = video
            $table->softDeletes();
            $table->timestamps();
        });
    }

    // https://imgugh.com/i/897hj
    // https://imgugh.com/i/4

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
