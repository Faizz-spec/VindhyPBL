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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('deskripsi');
            $table->string('image');
            $table->foreignId('status_id');
            $table->foreignId('category_id');
            $table->bigInteger('harga_total');
            $table->string('customer_name');
            $table->string('code_project');
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
