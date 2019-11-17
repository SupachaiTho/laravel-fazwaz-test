<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('property_id');
            $table->string('property_title');
            $table->text('description');
            $table->integer('bedroom')->default(0);
            $table->integer('bathroom')->default(0);
            $table->boolean('for_sale')->default(false);
            $table->boolean('for_rent')->default(false);
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('project_id');
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
        Schema::dropIfExists('properties');
    }
}
