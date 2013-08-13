<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->string('description');
			$table->smallInteger('category_id');
			$table->smallInteger('vendor_id');
			$table->string('image1');
			$table->string('image2')->nullable();
			$table->string('image3')->nullable();
			$table->integer('minunits')->nullable();
			$table->integer('maxunits')->nullable();
			$table->string('prop1')->nullable();
			$table->string('prop2')->nullable();
			$table->string('prop3')->nullable();
			$table->string('prop4')->nullable();
			$table->string('prop5')->nullable();
			$table->string('prop6')->nullable();
			$table->string('prop7')->nullable();
			$table->string('prop8')->nullable();
			$table->string('prop9')->nullable();
			$table->string('prop10')->nullable();
			$table->float('price')->nullable();
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
        Schema::drop('products');
    }

}
