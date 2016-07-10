<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicModelsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {

            $table->increments('id');
            $table->string('language', 25);
            $table->string('name', 100)->unique();
        });

        Schema::create('trips', function (Blueprint $table) {

            $table->increments('id');
            $table->string('trip_package', 5)->unique();
            $table->string('title', 100);
            $table->longtext('description');
            $table->boolean('availability')->default(true);
            $table->string('duration', 25);
            $table->integer('domain_id')->unsigned()->index();
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');

        });

        Schema::create('departures_dates', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('trip_id')->unsigned()->index();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->date('departure');

        });

        Schema::create('destinations', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title', 100);
            $table->string('country', 40);
            $table->longtext('description');
            $table->decimal('dest_lat', 15, 8);
            $table->decimal('dest_long', 15, 8);

        });

        Schema::create('destinations_photos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('dest_id')->unsigned()->index();
            $table->foreign('dest_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->string('photo', 40);
        });


        Schema::create('destinations_trips', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('trip_id')->unsigned()->index();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->integer('dest_id')->unsigned()->index();
            $table->foreign('dest_id')->references('id')->on('destinations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('departures_dates');

        Schema::drop('destinations_trips');

        Schema::drop('destinations_photos');

        Schema::drop('destinations');

        Schema::drop('trips');

        Schema::drop('domains');

    }
}
