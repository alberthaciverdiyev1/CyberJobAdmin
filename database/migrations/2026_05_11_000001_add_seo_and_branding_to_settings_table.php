<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('site_name')->nullable()->after('working_hours');
            $table->string('logo')->nullable()->after('site_name');
            $table->string('favicon')->nullable()->after('logo');
            $table->string('seo_title')->nullable()->after('favicon');
            $table->text('seo_description')->nullable()->after('seo_title');
            $table->text('seo_keywords')->nullable()->after('seo_description');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['site_name', 'logo', 'favicon', 'seo_title', 'seo_description', 'seo_keywords']);
        });
    }
};
