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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time');
            $table->string('supplier');
            $table->string('purchase_no');
            $table->string('madicine_name');
            $table->string('expire_date');
            $table->string('batch_id');
            $table->string('price');
            $table->string('quantity');
            $table->string('vat')->default(0);
            $table->string('discount_amount')->default(0);
            $table->string('total_amount');
            $table->string('paid_amount')->default(0);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('purchases');
    }
};