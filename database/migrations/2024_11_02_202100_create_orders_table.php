<?php

use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('employee_id')->constrained();
            $table->foreignId('employer_id')->constrained();
            $table->integer('quantity');
            $table->integer('product_price');
            $table->integer('total_price');
            $table->integer('shipping_cost');
            $table->enum('status', array_column(OrderStatus::cases(), 'value'));
            $table->string('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
