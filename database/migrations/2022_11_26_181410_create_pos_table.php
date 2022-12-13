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
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('invoice_no');
            $table->string('customer_name');
            $table->string('total_quantity');
            $table->string('total_amount');
            $table->string('vat')->default(0);
            $table->string('discount_amount')->default(0);
            $table->string('paid_amount')->default(0);
            $table->string('change_amount');
            $table->string('due_amount');
            $table->boolean('status')->default(0); 
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
        Schema::dropIfExists('pos');
    }
};
