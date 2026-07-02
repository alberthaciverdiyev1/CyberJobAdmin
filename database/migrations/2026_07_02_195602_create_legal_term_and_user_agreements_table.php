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
        Schema::create('legal_term_and_user_agreements', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('content');
            $table->boolean('is_active')->default(true);
            $table->string('type')->comment('terms, privacy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_term_and_user_agreements');
    }
};
