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
        Schema::create('retour_details', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->integer('retour_id')->nullable();
            $table->text('description')->nullable();
            $table->double('selling_qty')->nullable();
            $table->double('selling_price')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retour_details');
    }
};
