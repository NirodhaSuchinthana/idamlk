<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description', 500);
            $table->string('title', 100);
			$table->enum('authority', ['agent', 'owner']);
			$table->string('primary_image')->nullable();
			$table->boolean('verified')->default(false);
			$table->enum('type', ['sale', 'rent']);
			$table->string('location', 30);
			$table->string('price');

			// foreign keys
	        $table->integer('user_id')->unsigned();
	        $table->foreign('user_id')->references('id')->on('users');

	        $table->integer('district_id')->unsigned();
	        $table->foreign('district_id')->references('id')->on('districts');

	        $table->integer('district_area_id')->unsigned();
	        $table->foreign('district_area_id')->references('id')->on('district_areas');

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
        Schema::dropIfExists('advertisements');
    }
}
