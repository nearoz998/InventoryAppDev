<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
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
            $table->foreignId('supplier_id')->constrained('suppliers')->onUpdate('cascade');
            $table->date('date');
            $table->unsignedBigInteger('invoice_no');
            $table->text('details')->nullable();
            $table->string('payment_type');
            // $table->foreignId('product_id')->constrained('products')->onUpdate('cascade');
            $table->text('product_id');
            $table->text('quantity',16,2);
            $table->text('price',16,2);
            $table->text('sub_total',16,2);
            $table->unsignedDecimal('total',16,2);
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
}
