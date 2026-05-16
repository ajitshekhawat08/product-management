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

            // Product Title
            $table->string('title')
                  ->index();

            // Rich Text Description
            $table->longText('description');

            // Product Price
            $table->decimal('price', 10, 2);

            // Available Date
            $table->date('date_available')
                  ->index();

            // Created By User
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');

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