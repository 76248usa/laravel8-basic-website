<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_desc');
            $table->text('long_desc');
            $table->text('first_li');
            $table->text('second_li');
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
        Schema::dropIfExists('home_abouts');
    }
}
