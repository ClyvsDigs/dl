<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('sku')->unique();
        $table->text('description')->nullable();
        $table->string('category');
        $table->decimal('price', 10, 2);
        $table->decimal('cost_price', 10, 2);
        $table->integer('stock');
        $table->integer('min_stock_level');
        $table->string('supplier_name');
        $table->string('supplier_contact');
        $table->timestamps();
    });
}
};
