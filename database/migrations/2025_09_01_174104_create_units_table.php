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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->enum('status', ['active', 'inactive', 'pending', 'suspended'])->default('active');
            $table->foreignId('franchisee_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('franchisor_id')->constrained('users')->onDelete('cascade');
            $table->decimal('revenue', 12, 2)->default(0);
            $table->decimal('monthly_target', 12, 2)->nullable();
            $table->date('opening_date')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
