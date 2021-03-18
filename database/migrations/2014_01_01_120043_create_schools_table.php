<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('school_name', 255)->unique();
            $table->string('school_code', 100)->nullable(true);
            $table->string('registration_date', 50)->nullable(true);
            $table->string('address', 255);
            $table->string('phone', 10)->nullable(true);
            $table->string('email', 50);
            $table->text('footer')->nullable(true);
            $table->string('logo', 120)->nullable(true);
            $table->string('frontend_logo', 120)->nullable(true);
            $table->integer('academic_year_id')->nullable(true);
            $table->string('academic_year', 20)->nullable(true);
            $table->string('school_lat', 100)->nullable(true);
            $table->string('school_lng', 100)->nullable(true);
            $table->string('map_api_key', 255)->nullable(true);
            $table->string('zoom_api_key', 120)->nullable(true);
            $table->string('zoom_secret', 150)->nullable(true);
            $table->tinyInteger('enable_frontend')->default(1);
            $table->tinyInteger('enable_online_admission')->default(0);
            $table->tinyInteger('final_result_type')->default(0);
            $table->text('about_text')->nullable(true);
            $table->string('about_image', 100)->nullable(true);
            $table->string('facebook_url', 255)->nullable(true);
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by');
            $table->integer('modified_by');
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
        Schema::dropIfExists('schools');
    }
}
