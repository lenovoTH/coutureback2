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
        Schema::disableForeignKeyConstraints();

        Schema::create('article_ventes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle', 255)->unique();
            $table->integer('quantiteStock')->nullable();
            $table->float('prix');
            $table->float('cout');
            $table->float('marge')->nullable();
            $table->float('promo')->nullable();
            $table->string('reference', 255);
            $table->binary('photo')->nullable();
            $table->foreignId('categorie_id')->constrained('categories');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_ventes');
    }
};