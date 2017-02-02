<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesFunnelItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_funnel_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sf_id')->default(1);#salles funnel id
            $table->string('type');
            $table->string('header');
            $table->string('short_description');
            $table->string('color');
            $table->integer('serial');
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
        Schema::dropIfExists('sales_funnel_items');
    }
}
