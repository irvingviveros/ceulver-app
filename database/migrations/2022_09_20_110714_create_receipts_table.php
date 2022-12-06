<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable(false);
            $table->string('sheet')->unique()->nullable(true); // Folio
            $table->string('payment_method')->nullable(false);
            $table->string('payment_concept')->nullable(false);
            $table->decimal('amount', 10, 2)->nullable(false);
            $table->string('amount_text')->nullable(false);
//            $table->string('status')->nullable();
            $table->date('issued_date')->nullable();
            $table->text('note')->nullable();
            $table->integer('created_by');
            $table->integer('modified_by')->nullable(true);
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
        Schema::dropIfExists('receipts');
    }
}
