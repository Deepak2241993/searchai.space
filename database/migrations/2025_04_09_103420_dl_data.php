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
    Schema::create('dl_datas', function (Blueprint $table) {
        $table->id();
        $table->string('name')->nullable();
        $table->date('dob')->nullable();
        $table->string('address')->nullable();
        $table->string('dependent_name')->nullable();
        $table->string('document_type')->nullable();
        $table->string('document_id')->nullable();
        $table->integer('pincode')->nullable();
        $table->date('issue_date')->nullable();
        $table->date('expiry_date')->nullable();
        $table->string('state')->nullable();
        $table->string('authority')->nullable();
        $table->string('category')->nullable();
        $table->string('as_per_category_authority')->nullable();
        $table->string('token_id')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
