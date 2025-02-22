<?php

use App\Models\Customer;
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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->foreignIdFor(Customer::class, 'created_for')
                ->constrained('customers');
            $table->foreignIdFor(User::class, 'created_by')
                ->constrained('users');
            $table->date('invoice_date');
            $table->decimal('discount', 3, 2)->default(0);
            $table->decimal('vat', 3, 2);
            $table->decimal('grand_price');
            $table->enum('status', ['OPEN', 'PAID']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
