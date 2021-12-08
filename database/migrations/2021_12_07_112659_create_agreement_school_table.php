<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pivot table agreements - schools
        Schema::create('agreement_school', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agreement_id')->constrained();
            $table->foreignId('school_id')->constrained();
            $table->float('discount_price')->default(0);
            $table->float('discount_percentage')->default(0);
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
        Schema::dropIfExists('agreement_school');
    }
}
