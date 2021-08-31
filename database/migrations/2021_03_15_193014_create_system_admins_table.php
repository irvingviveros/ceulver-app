<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_admins', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_default')->default(0);
            $table->string('name',100);
            $table->string('last_name', 100);
            $table->string('email',50);
            $table->string('phone',10);
            $table->string('address', 255)->nullable(true);
            $table->string('gender', 10)->nullable(true);
            $table->date('birthday');
            $table->string('photo', 100)->nullable(true);
            $table->string('resume', 100)->nullable(true);
            $table->text('other_info')->nullable(true);
            $table->tinyInteger('status');
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamps();

            // Foreign key
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_admins');
    }
}
