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
        Schema::create('service_agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('agreement_number')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('hourly_rate', 10, 2);
            $table->integer('total_hours');
            $table->text('services_provided');
            $table->text('terms_conditions');
            $table->enum('status', ['draft', 'active', 'expired', 'cancelled'])->default('draft');
            $table->string('document_path')->nullable();
            $table->dateTime('signed_at')->nullable();
            $table->string('signed_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_agreements');
    }
};
