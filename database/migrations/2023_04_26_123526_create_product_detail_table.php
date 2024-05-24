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
        Schema::create('product_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_size_color_id')->constrained('product_size_color')->onDelete('cascade');
            $table->text('color_size_combination');
            $table->text('description');
            $table->text('title');
            $table->integer('quantity');
            $table->integer('discount');
            $table->enum('discount_type', ['flat', 'percentage'])->default('percentage');
            $table->integer('discount_price');
            // $table->integer('selling_price');
            $table->integer('mrp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_detail');
    }
};
