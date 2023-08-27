<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ArticleConfection;
use App\Http\Resources\CategorieResource;
use App\Http\Resources\FournisseurResource;
use App\Http\Resources\ArticleConfectionResource;
use App\Http\Requests\ArticleConfectionStoreRequest;
use App\Http\Requests\ArticleConfectionUpdateRequest;

class ArticleConfectionController extends Controller
{
    public function index(Request $request)
    {
        $articles = ArticleConfection::all();
        $fournisseurs = Fournisseur::all();
        // $fourart = ArticleConfection::with('fournisseurs')->get();
        $categories = Categorie::all();
        return [
            'articles' => ArticleConfectionResource::collection($articles),
            'categories' => CategorieResource::collection($categories),
            'fournisseurs' => FournisseurResource::collection($fournisseurs)
        ];
    }

    public function store(Request $request)
    {
        $categorie = Categorie::where('libelle', $request->categorie)->first();
        $request->validate([
            // 'libelle' => 'required',
            // 'prix' => 'required',
            // 'stock' => 'required',
            // 'photo' => 'image|mimes:png,jpg,jpeg'
        ]);
        $image_path = $request->file('photo');
        $article = ArticleConfection::create([
            'libelle' => $request->libelle,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'fournisseur_id' => $request->fournisseur,
            'categorie_id' => $categorie->id,
            'reference' => $request->reference,
            'photo' => $image_path
        ]);
        return new ArticleConfectionResource($article);
    }

    public function show(Request $request, ArticleConfection $articleConfection)
    {
        return new ArticleConfectionResource($articleConfection);
    }

    public function update(ArticleConfectionUpdateRequest $request, ArticleConfection $articleConfection)
    {
        $articleConfection->update($request->validated());

        return new ArticleConfectionResource($articleConfection);
    }

    public function destroy(Request $request, ArticleConfection $articleConfection)
    {
        $articleConfection->delete();

        return response()->noContent();
    }
}
