<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('province_id');
            $table->integer('city_id');
            $table->string('district_id');
            $table->string('cart_id');
            $table->string('courier');
            $table->string('subtotal');
            $table->string('ongkir');
            $table->string('service');
            $table->string('payment');
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->integer('is_active');
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
        Schema::dropIfExists('checkouts');
    }
}
