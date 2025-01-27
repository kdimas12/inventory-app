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
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->string('customer_name')->nullable();
            $table->string('invoice_number', 100)->unique();
            $table->date('sale_date');
            $table->decimal('total_amount', 15, 2);
            $table->enum('payment_status', ['lunas', 'belum_lunas'])->default('belum_lunas');
            $table->enum('payment_method', ['tunai', 'transfer']);
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
