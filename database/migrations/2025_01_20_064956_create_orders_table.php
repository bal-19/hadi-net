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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique()->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('technician_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('package_id')->constrained('packages')->onDelete('cascade');
            $table->decimal('installation_fee', 12, 0);
            $table->decimal('total', 12, 0);
            $table->string('latitude');
            $table->string('longitude');
            $table->dateTime('order_date');
            $table->enum('order_status', ['expired', 'unpaid', 'paid', 'failed', 'processing', 'completed', 'cancelled'])->default('unpaid');
            $table->dateTime('installation_date')->nullable();
            $table->longText('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
