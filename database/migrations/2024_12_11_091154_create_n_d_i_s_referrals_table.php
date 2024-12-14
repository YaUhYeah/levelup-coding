<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('n_d_i_s_referrals', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('ndis_number');
            $table->date('date_of_birth');
            $table->text('support_needs');
            $table->text('goals');
            $table->string('referrer_name')->nullable();
            $table->string('referrer_organization')->nullable();
            $table->string('referrer_phone')->nullable();
            $table->string('referrer_email')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('n_d_i_s_referrals');
    }
};
