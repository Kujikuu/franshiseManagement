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
            // Business document fields
            $table->string('logo_path')->nullable()->after('business_email');
            $table->string('disclosure_doc_path')->nullable()->after('logo_path');
            $table->string('agreement_doc_path')->nullable()->after('disclosure_doc_path');
            $table->string('operations_doc_path')->nullable()->after('agreement_doc_path');
            $table->string('guideline_doc_path')->nullable()->after('operations_doc_path');
            $table->string('legal_doc_path')->nullable()->after('guideline_doc_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'logo_path',
                'disclosure_doc_path',
                'agreement_doc_path',
                'operations_doc_path',
                'guideline_doc_path',
                'legal_doc_path'
            ]);
        });
    }
};
