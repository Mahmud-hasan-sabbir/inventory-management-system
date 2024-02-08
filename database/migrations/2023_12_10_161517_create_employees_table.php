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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('perso_number')->nullable();
            $table->string('nid')->nullable();
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->string('em_con_name')->nullable();
            $table->string('em_con_number')->nullable();
            $table->string('relationship')->nullable();
            $table->integer('vacation')->nullable();
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->text('remarks')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->integer('desig_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('employees');
    }
};
