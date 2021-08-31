<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->tinyInteger('status')->default(1);
            $table->string('password');
            $table->integer('created_by')->default('0');
            $table->integer('modified_by')->default('0');
            $table->rememberToken();
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('role_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
