<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('weight')->nullable();
            $table->unsignedBigInteger('size');
            $table->foreignId('unit_id')->constrained('product_units')->onUpdate('cascade');
            $table->text('details')->nullable();
            // $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained('product_categories')->onUpdate('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onUpdate('cascade');
            $table->string('TempQuantity',16,2)->nullable()->default(0);
            $table->unsignedDecimal('quantity',16,2)->nullable()->default(0);
            $table->unsignedDecimal('price',16,2);
            $table->unsignedDecimal('service_rate',16,2);
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
        Schema::dropIfExists('products');
    }
}
