<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('pro_id');
            $table->string('pro_name',50);
            $table->string('pro_imge');
            $table->Float('pro_price');
            $table->Float('pro_disc');
            $table->Integer('pro_gid');
            $table->string('pro_description');
            $table->string('pro_available',15);
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
        Schema::dropIfExists('product');
    }
}
