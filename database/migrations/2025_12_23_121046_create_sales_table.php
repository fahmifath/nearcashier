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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();

            $table->decimal('total_item', 15, 2);
            $table->foreignId('discount_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('total_discount', 15, 2)->default(0);
            $table->decimal('grand_total', 15, 2);

            $table->decimal('paid_amount', 15, 2);
            $table->decimal('change_amount', 15, 2);

            $table->enum('payment_method', ['cash', 'qris', 'transfer']);
            $table->dateTime('transaction_date')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
