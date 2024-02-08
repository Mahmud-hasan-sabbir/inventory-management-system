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
        Schema::create('salary_processes', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id')->nullable();
            $table->integer('current_salary')->nullable();
            $table->integer('advanced_salary')->nullable();
            $table->integer('total_vacation')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->integer('leave')->nullable();
            $table->integer('without_pay_leave')->nullable();
            $table->string('status')->nullable();
            $table->date('date')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('salary_processes');
    }
};
