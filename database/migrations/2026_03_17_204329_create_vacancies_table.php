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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('requirements');
            $table->longText('description');
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->integer('view_count')->default(0);
            $table->dateTime('expire_date')->default(now()->addDays(30));
            $table->string('banner_image')->nullable();
            $table->float('min_salary')->nullable();
            $table->float('max_salary')->nullable();
            $table->tinyInteger('min_age')->nullable();
            $table->tinyInteger('max_age')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_bring_top')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
