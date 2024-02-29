<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->text('section_desc')->nullable();
            $table->string('user_photo');
            $table->string('position');
            $table->longText('summery');
            $table->string('dob');
            $table->string('website');
            $table->string('phone');
            $table->string('city');
            $table->integer('age');
            $table->string('degree');
            $table->string('email');
            $table->integer('freelance')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
