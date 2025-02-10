<?php

use App\Models\Order;
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
            $table->string('customer_name', 200);
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->text('address');
            $table->decimal('total_price', 10, 2)->default(0);
            $table->tinyInteger('status')->default(Order::STATUS_PENDING);
            $table->timestamp('shipped_at')->nullable();
            $table->softDeletes();
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
