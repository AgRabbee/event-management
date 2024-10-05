<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->longText('ticket_packages');
            $table->longText('form_fields');
            $table->text('sms_format');
            $table->longText('mail_format');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_configurations');
    }
};
