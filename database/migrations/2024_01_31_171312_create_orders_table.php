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
            $table->id();
            $table->bigInteger("customer_id")->nullabel();
            $table->string("order_date")->nullabel();
            $table->string("invoice_no")->nullabel();
            $table->integer("total_product")->nullabel();
            $table->integer("sub_total")->nullabel();
            $table->integer("vat")->nullabel();
            $table->string("total")->nullabel();
            $table->string("pay_type")->nullabel();
            $table->integer("pay_amount")->nullabel();
            $table->integer("due_amount")->nullabel();
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
