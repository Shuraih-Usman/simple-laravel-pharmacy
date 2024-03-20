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
        Schema::create('product', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('quantity')->nullable(false);
            $table->double('price');
            $table->unsignedBigInteger('cat_id')->nullable(false);
            $table->text('description');
            $table->foreign('cat_id')->references('id')->on('category');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            //
        });
    }
};
