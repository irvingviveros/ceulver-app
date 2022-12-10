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
            $table->string('name', 255);
            $table->string('code', 100)->nullable();
            $table->string('registration_date', 50)->nullable();
            $table->string('tax_id', 25)->nullable();
            $table->string('address', 255);
            $table->string('phone', 50)->nullable();
            $table->string('email', 50);
            $table->text('footer')->nullable();
            $table->string('logo')->nullable();
            $table->string('frontend_logo')->nullable();
            $table->integer('academic_year_id')->nullable();
            $table->string('academic_year', 20)->nullable();
            $table->string('school_lat', 100)->nullable();
            $table->string('school_lng', 100)->nullable();
            $table->string('map_api_key', 255)->nullable();
            $table->string('zoom_api_key', 120)->nullable();
            $table->string('zoom_secret', 150)->nullable();
            $table->tinyInteger('enable_frontend')->default(1);
            $table->tinyInteger('enable_online_admission')->default(0);
//            $table->tinyInteger('final_result_type')->default(0);
            $table->text('about_text')->nullable();
            $table->string('about_image', 100)->nullable();
            $table->string('facebook_url', 255)->nullable();
            $table->tinyInteger('status')->default(1);
            // Foreign key
            $table->foreignId('educational_system_id')->nullable()->constrained();

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
        Schema::dropIfExists('career_school');
        Schema::dropIfExists('academic_years');
        Schema::dropIfExists('schools');
    }
}
