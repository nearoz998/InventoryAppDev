<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
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
            $table->string('name');
            $table->foreignId('designation_id')->constrained('designations')->onUpdate('cascade');
            $table->unsignedBigInteger('phone');
            $table->string('rate_type')->nullable();
            $table->unsignedDecimal('rate',16,2)->nullable();
            $table->string('email')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('picture')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('zip_code')->nullable();
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
}
