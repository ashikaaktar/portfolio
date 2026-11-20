<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('institution_en');
            $table->string('institution_bn');
            $table->string('degree_en');
            $table->string('degree_bn');
            $table->string('field_of_study_en')->nullable();
            $table->string('field_of_study_bn')->nullable();
            $table->string('period_en')->nullable();
            $table->string('period_bn')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('grade')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
