<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('category');

            $table->decimal('purchase_price', 10, 2);

            $table->decimal('expected_sale_price', 10, 2)
                ->nullable();

            $table->decimal('sale_price', 10, 2)
                ->nullable();

            $table->decimal('transport_cost', 10, 2)
                ->default(0);

            $table->date('purchase_date');

            $table->date('sale_date')
                ->nullable();

            $table->string('purchase_payment')
                ->nullable();

            $table->string('sale_payment')
                ->nullable();

            $table->string('status')
                ->default('available');

            $table->text('tags')
                ->nullable();

            $table->text('notes')
                ->nullable();

            $table->boolean('has_defect')
                ->default(false);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};