<?php

use App\Models\ArticleConfection;
use App\Models\ArticleVente;
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
        Schema::create('article_vente_article_confections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ArticleVente::class)->constrained();
            $table->foreignIdFor(ArticleConfection::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_vente_article_confections');
    }
};
