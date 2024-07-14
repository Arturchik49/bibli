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
        Schema::create('zabron_knigi', function (Blueprint $table) {
            $table->id();
            $table->text('nazvanie');
            $table->text('zhanr');
            $table->text('izdanie');
            $table->text('avtor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zabron_knigi');
    }
};
