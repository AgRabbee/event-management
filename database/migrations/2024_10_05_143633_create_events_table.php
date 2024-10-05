<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug');
            $table->text('short_desc');
            $table->longText('long_desc');
            $table->dateTime('event_from');
            $table->dateTime('event_to');
            $table->dateTime('ticket_available_till');
            $table->string('event_social_link');
            $table->string('event_location');
            $table->string('event_location_address');
            $table->longText('event_location_map');
            $table->string('event_feature_link');
            $table->string('event_image_link');
            $table->string('event_banner_image_link');
            $table->longText('organizer_info');
            $table->tinyInteger('status')->default(0)->comment('0: Inactive, 1: Active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
