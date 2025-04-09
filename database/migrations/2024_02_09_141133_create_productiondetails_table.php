<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productiondetails', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->integer('production_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->double('planche_nbr')->nullable();
            $table->text('equipe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productiondetails');
    }
};
