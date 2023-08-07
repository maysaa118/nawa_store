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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            //$table->unsignedBigInteger('category_id')->nullable();
            //$table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories', 'id')
                ->nullOnDelete();
            
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->float('price')->default(0);
            $table->float('compare_price')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['draft', 'active', 'archived'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
