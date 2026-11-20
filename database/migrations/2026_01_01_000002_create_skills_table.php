<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // Digital Marketing, Development, Creative Skills
            $table->integer('proficiency_percent')->default(85); // Configurable by admin
            $table->string('icon')->nullable();
            $table->string('badge_text')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
