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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('com_name')->nullable();
            $table->string('com_email')->nullable();
            $table->string('com_phone')->nullable();
            $table->string('com_mobile')->nullable();
            $table->string('com_city')->nullable();
            $table->string('com_country')->nullable();
            $table->integer('com_zipcode')->nullable();
            $table->text('com_address')->nullable();
            $table->text('com_logo')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
