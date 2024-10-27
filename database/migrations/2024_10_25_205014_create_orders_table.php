<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id');
            $table->string('event_id');
            $table->string('customer_name');
            $table->string('customer_mobile');
            $table->longText('customer_info');
            $table->longText('contact_info');
            $table->string('ticket_package');
            $table->integer('no_of_tickets');
            $table->float('actual_price', 9, 2);
            $table->float('order_price', 9, 2);
            $table->tinyInteger('order_status')->default(0)->comment('0: Pending, 1: Confirmed, 2: Cancelled');
            $table->tinyInteger('payment_status')->default(0)->comment('0: Pending, 1: Paid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
