<?php

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Invoice::class, 'invoice_id')
                ->constrained('invoices');
            $table->foreignIdFor(User::class, 'created_by')
                ->constrained('users');
            $table->string('payment_record_number')->unique();
            $table->string('or_number')->unique();
            $table->date('payment_date');
            $table->decimal('amount_paid');
            $table->enum('type', ['CREDIT_CARD', 'CASH', 'CHECK', 'DIRECT_DEBIT', 'BANK_TRANSFER']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
