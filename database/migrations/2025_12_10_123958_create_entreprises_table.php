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
        Schema::dropIfExists('entreprises');

        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('modules')->cascadeOnDelete();
            $table->string('nom');
            $table->text('courte_description')->nullable();
            $table->longText('longue_description')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->string('fondateurs')->nullable(); // nom complet + profession
            $table->date('date_debut_creation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
