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
      Schema::create('students', function (Blueprint $table) {
    $table->id();

    $table->string('name');
    $table->string('phone');
    $table->integer('age');
    $table->string('email')->unique();

    $table->json('school');
    $table->enum('gender', ['female', 'male']);

    $table->integer('english');
    $table->enum('campus', ['casablanca', 'mohammedia', 'rabat']);

    $table->boolean('terms');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
