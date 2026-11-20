<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company_en');
            $table->string('company_bn');
            $table->string('role_en');
            $table->string('role_bn');
            $table->string('location_en')->nullable();
            $table->string('location_bn')->nullable();
            $table->string('type_en')->default('Full-Time'); // Full-Time, Freelance, Remote
            $table->string('type_bn')->default('ফুল-টাইম');
            $table->string('period_en')->nullable(); // e.g. "2023 - Present"
            $table->string('period_bn')->nullable(); // e.g. "২০২৩ - বর্তমান"
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->json('achievements_en')->nullable();
            $table->json('achievements_bn')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
