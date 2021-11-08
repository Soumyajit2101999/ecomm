<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->Integer('user_id');
            $table->Float('total_price');
            $table->Float('discount');
            $table->Float('tax');
            $table->Float('delivery_charge');
            $table->string('payment_method',30);
            $table->string('payment_status',20);
            $table->Integer('order_unique_id');
            $table->string('delivery_status',30);
            $table->string('delivery_date',30);
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
}
