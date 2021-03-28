<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_settings', function (Blueprint $table) {
            $table->id();
            $table->string('mail_protocol', 10)->default('smtp');
            $table->string('smtp_host', 100);
            $table->string('smtp_port', 20);
            $table->string('smtp_timeout', 4);
            $table->string('smtp_user', 100);
            $table->string('smtp_pass', 100);
            $table->string('smtp_crypto', 50);
            $table->string('mail_type', 4);
            $table->string('char_set', 50);
            $table->tinyInteger('priority');
            $table->string('from_name', 100);
            $table->string('from_address',100);
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamps();

            // Foreign key
            $table->foreignId('school_id')->references('id')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_settings');
    }
}
