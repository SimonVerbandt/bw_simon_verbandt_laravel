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
            $table->string('subject');
            $table->text('content');
            $table->foreignId('admin_id')->constrained('users');
            $table->foreignId('contact_form_id')->constrained('contact_forms');
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
