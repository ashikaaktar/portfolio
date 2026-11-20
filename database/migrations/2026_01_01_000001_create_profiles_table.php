<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Ashika');
            $table->string('title_en')->default('Digital Marketer & Developer');
            $table->string('title_bn')->default('ডিজিটাল মার্কেটার এবং ডেভেলপার');
            $table->string('headline_en')->default('I Build Digital Experiences & Grow Businesses.');
            $table->string('headline_bn')->default('আমি ডিজিটাল প্রযুক্তি ও ক্রিয়েটিভ সলিউশনের মাধ্যমে ব্যবসাকে এগিয়ে নিতে কাজ করি।');
            $table->text('tagline_en')->nullable();
            $table->text('tagline_bn')->nullable();
            $table->text('bio_en')->nullable();
            $table->text('bio_bn')->nullable();
            $table->longText('about_en')->nullable();
            $table->longText('about_bn')->nullable();
            $table->text('career_goals_en')->nullable();
            $table->text('career_goals_bn')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('cv_path')->nullable();
            $table->string('email')->default('ashika@example.com');
            $table->string('phone')->nullable();
            $table->string('whatsapp_number')->default('01938267920');
            $table->string('whatsapp_link')->default('https://wa.me/8801938267920');
            $table->string('location_en')->default('Dhaka, Bangladesh');
            $table->string('location_bn')->default('ঢাকা, বাংলাদেশ');
            $table->integer('years_of_experience')->default(4);
            $table->integer('completed_projects')->default(45);
            $table->integer('happy_clients')->default(38);
            $table->integer('satisfaction_rate')->default(99);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
