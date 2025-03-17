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
        Schema::create('gift_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('category_id')->nullable();
            $table->decimal('discount_rate', 8, 2)->nullable()->default(0.00);
            $table->tinyInteger('status')->defalut();
            $table->string('apply_condition')->nullable();
            $table->mediumText('redeem_description')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('user_token')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_coupons');
    }
};
