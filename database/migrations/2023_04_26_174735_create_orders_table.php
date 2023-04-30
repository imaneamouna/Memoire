<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('status')->default(0);//  صفر لم يتم التسليم/واحد تم التسليم /حاله التوصيل
            $table->string('payment_method');// طريقة الدفع بأي بطاقة بنكية
            $table->string('payment_status');//حالة الدفع قبل أو بعد الاستلام
            $table->string('payment_id');// PayPal رقم الفاتوره مثل ذلك من
            $table->string('total_price');
            $table->string('address');
            $table->string('phone');//رقم الهاتف الذي سنوصل الطلب إليه
            $table->string('email');
            $table->string('name');//اسم العميل الذي سيستلم الطلب
            $table->string('surname');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->string('shipping_price');//مصاريف الشحن
            //i forget total pice









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
        Schema::dropIfExists('orders');
    }
};
