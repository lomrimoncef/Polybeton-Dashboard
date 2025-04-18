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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('retour_id')->nullable();
            $table->string('paid_status',51)->nullable();
            $table->double('paid_amount')->nullable();
            $table->double('due_amount')->nullable();
            $table->text('payment_type')->nullable();
            $table->double('tva')->nullable();
            $table->integer('timbre')->nullable();
            $table->double('total_amount_ht')->nullable();
            $table->double('total_amount')->nullable();
            $table->date('date_payment')->nullable();
            $table->double('discount_amount')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
