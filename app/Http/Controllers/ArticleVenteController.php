<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\ArticleVente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\CategorieResource;
use App\Http\Resources\FournisseurResource;
use App\Http\Resources\ArticleVenteResource;
use App\Http\Resources\ArticleVenteCollection;
use App\Http\Requests\ArticleVenteStoreRequest;
use App\Http\Requests\ArticleVenteUpdateRequest;
use App\Models\ArticleConfection;
use App\Models\ArticleVenteArticleConfection;

class ArticleVenteController extends Controller
{
    public function index(Request $request)
    {
        $articles = ArticleVente::all();
        $fournisseurs = Fournisseur::all();
        // $articleConf= ArticleVente::with('articleconfections')->get();
        $categories = Categorie::all();
        return [
            'articlesVente' => ArticleVenteResource::collection($articles),
            'categories' => CategorieResource::collection($categories),
            'fournisseurs' => FournisseurResource::collection($fournisseurs)
        ];
    }

    public function store(Request $request)
    {
        // dd($request->cout);
        $image_path = $request->file('photo');
        $categorie = Categorie::where('libelle', $request->categorie)->first();
        $articleVente = ArticleVente::create([
            'libelle' => $request->libelle,
            'prix' => $request->prix,
            'quantiteStock' => $request->stock,
            'categorie_id' => $categorie->id,
            'reference' => $request->reference,
            'photo' => $image_path,
            'promo' => $request->promo,
            'cout' => $request->cout,
            'marge' => $request->marge,
        ]);
        foreach ($request->articleConfection as $key) {
            ArticleVenteArticleConfection::create([
                'article_vente_id' => $articleVente->id,
                'article_confection_id' => $key
            ]);
        }
        return response()->json($articleVente);
    }

    public function show(Request $request, ArticleVente $articleVente)
    {
        return new ArticleVenteResource($articleVente);
    }

    public function update(ArticleVenteUpdateRequest $request, ArticleVente $articleVente)
    {
        $articleVente->update($request->validated());

        return new ArticleVenteResource($articleVente);
    }

    public function destroy(Request $request, ArticleVente $articleVente)
    {
        $articleVente->delete();

        return response()->noContent();
    }
}
