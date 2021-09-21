<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conventions', function (Blueprint $table) {
            $table->id();
            $table->string('convention',100);
            $table->text('note')->nullable(true);
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conventions');
    }
}
