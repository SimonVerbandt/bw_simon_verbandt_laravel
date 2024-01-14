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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('question');
            $table->text('answer');
            $table->string('slug')->unique();
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('category_id')->constrained('faq_categories')->onDelete('cascade');
            $table->string('category_name')->references('name')->on('faq_categories');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
