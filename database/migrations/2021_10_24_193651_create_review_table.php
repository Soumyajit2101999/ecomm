<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->id('r_id');
            $table->Integer('user_id');
            $table->Integer('pro_id');
            $table->Integer('rate_quality');
            $table->Integer('rate_price');
            $table->Integer('rate_value');
            $table->string('user_name',55);
            $table->string('summary',100);
            $table->string('review');
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
        Schema::dropIfExists('review');
    }
}
