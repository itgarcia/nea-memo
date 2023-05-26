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
        Schema::create('memo_to_ecs', function (Blueprint $table) {
            $table->id();
            $table->date('date_memo');
            $table->string('no_memo', 100);
            $table->string('title', 100);
            $table->string('signatory', 50);
            $table->dateTime('date_posted');
            $table->string('upload', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memo_to_ecs');
    }
};
