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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sup_id')->nullable();
            $table->bigInteger('cat_id')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('godown')->nullable();
            $table->string('rack')->nullable();
            $table->integer('buying_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('remarks')->nullable();
            $table->string('status')->default('Active');
            $table->text('image')->nullable();
            $table->integer('is_approve')->default(0);
            $table->bigInteger('user_id')->nullable();
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
        Schema::dropIfExists('product_details');
    }
};
