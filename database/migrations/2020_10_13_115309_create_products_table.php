<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // brand
            $table->bigInteger('brand_id')->unsigned()->index()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('set null');

            // model
            $table->bigInteger('model_id')->unsigned()->index()->nullable();
            $table->foreign('model_id')->references('id')->on('brand_models')->onUpdate('set null');

            // category
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('set null');

            // fuels
            $table->bigInteger('fuel_id')->unsigned()->index()->nullable();
            $table->foreign('fuel_id')->references('id')->on('fuels')->onUpdate('set null');

            // transmission
            $table->bigInteger('transmission_id')->unsigned()->index()->nullable();
            $table->foreign('transmission_id')->references('id')->on('transmissions')->onUpdate('set null');

            // Deal Type
            $table->bigInteger('deal_id')->unsigned()->index()->nullable();
            $table->foreign('deal_id')->references('id')->on('deals')->onUpdate('set null');


            $table->string('title_ge');
            $table->string('title_en');
            $table->text('description_ge')->nullable();
            $table->text('description_en')->nullable();
            $table->float('price');
            $table->timestamp('created_date');
            $table->string('mileage');
            $table->string('phone');
            $table->string('engine_capacity');
            $table->boolean('wheel');
            $table->boolean('custom');
            $table->boolean('vip')->default(false);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('products');
    }
}
