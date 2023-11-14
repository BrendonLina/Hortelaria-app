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
        Schema::create('quartos', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->integer('capacidade');
            $table->decimal('preco_diaria', 8, 2);
            $table->boolean('disponivel')->default(true);
            $table->timestamps();
            });
            
            Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('data_checkin');
            $table->date('data_checkout');
            $table->unsignedBigInteger('quarto_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('quarto_id')->references('id')->on('quartos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
