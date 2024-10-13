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
        Schema::create('projects_spareparts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreignId('sparepart_id');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('sparepart_id')->references('id')->on('spareparts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_spareparts');
    }
};
