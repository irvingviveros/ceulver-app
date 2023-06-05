<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('unique_exam_receipts', function (Blueprint $table) {
            $table->id();
            $table->integer('sheet_id')->unique();
            $table->foreignId('receipt_id');
            $table->foreignId('unique_exam_candidate_id');
            $table->integer('created_by');
            $table->integer('modified_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unique_exam_receipts');
    }
};
