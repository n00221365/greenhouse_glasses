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
        Schema::create('figures', function (Blueprint $table) {
            $table->id();
            $table->string("firstName");
            $table->string("lastName");
            $table->string("image")->default("x.jpg");
            $table->integer("score");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('figures');
    }
};
