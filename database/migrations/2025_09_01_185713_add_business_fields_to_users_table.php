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
        Schema::table('users', function (Blueprint $table) {
            // Business information fields
            $table->string('website')->nullable()->after('brand_name');
            $table->string('legal_name')->nullable()->after('website');
            $table->string('structure')->nullable()->after('legal_name');
            $table->string('tax_id')->nullable()->after('structure');
            $table->string('industry')->nullable()->after('tax_id');
            $table->decimal('funding_amount', 15, 2)->nullable()->after('industry');
            $table->string('funding_source')->nullable()->after('funding_amount');
            $table->string('business_phone')->nullable()->after('funding_source');
            $table->string('business_email')->nullable()->after('business_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'website',
                'legal_name',
                'structure',
                'tax_id',
                'industry',
                'funding_amount',
                'funding_source',
                'business_phone',
                'business_email'
            ]);
        });
    }
};
