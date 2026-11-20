<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_bn');
            $table->string('slug')->unique();
            $table->text('description_en');
            $table->text('description_bn');
            $table->string('icon')->default('sparkles');
            $table->json('features_en')->nullable();
            $table->json('features_bn')->nullable();
            $table->string('tag_en')->nullable();
            $table->string('tag_bn')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
