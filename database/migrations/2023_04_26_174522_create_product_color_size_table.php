<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Decimal;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_color_size', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_size_id')->unsigned();
            $table->integer('product_color_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_size_id')->references('id')->on('product_sizes');
            $table->foreign('product_color_id')->references('id')->on('product_color');
            $table->integer('quantity');// al kimiya i stock
            $table->Decimal('second_price',8,2)->nullable();
            $table->Decimal('second_discount',8,2)->nullable();
            $table->integer('status')->default(1);//واحد يعني موجود & الصفر يعني نفاد المخزون

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
        Schema::dropIfExists('product_color_size');
    }
};
