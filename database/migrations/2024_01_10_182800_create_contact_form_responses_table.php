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
        Schema::create('contact_form_responses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('content');
        });
        Schema::table('contact_form_responses', function (Blueprint $table) {
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('username')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_form_responses');
    }
};
