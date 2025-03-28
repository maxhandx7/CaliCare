<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('lastname')->nullable();
            $table->enum('id_type', ['cc', 'ce', 'passport'])->default('cc');
            $table->string('num_doc')->unique()->nullable();
            $table->text('bio')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->default('Colombia');
            // Campos específicos para cuidadores:
            $table->integer('experience_years')->nullable();
            $table->enum('availability', ['full_time', 'part_time', 'weekends'])->nullable();
            $table->json('schedule')->nullable(); // Horarios en JSON
            $table->string('certifications')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
