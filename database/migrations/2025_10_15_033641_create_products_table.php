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
            $table->string('description', 191);
            $table->string('stock', 191);
            $table->string('price', 191);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('status', 10)->default('1')->after('category_id');
        });
    }

    /**i
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
