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
        Schema::create('product_size_color', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('color_id')->constrained('color')->onDelete('cascade');
            $table->foreignId('size_id')->constrained('size')->onDelete('cascade');
            $table->foreignId('product_weight_id')->constrained('product_weight')->onDelete('cascade');
            $table->foreignId('product_dimension_id')->constrained('product_dimension')->onDelete('cascade');
            $table->foreignId('product_special_feature_id')->constrained('product_special_feature')->onDelete('cascade');
            $table->foreignId('product_material_id')->constrained('product_material')->onDelete('cascade');
            $table->enum('available_stock', ['yes', 'no'])->default('no');
            $table->enum('today\'s_deal', ['yes', 'no'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_size_color');
    }
};
