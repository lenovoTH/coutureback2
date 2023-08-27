<?php

namespace App\Http\Resources;

use App\Models\ArticleVente;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleVenteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'libelle' => $this->libelle,
            'quantiteStock' => $this->quantiteStock,
            'prix' => $this->prix,
            'cout' => $this->cout,
            'marge' => $this->marge,
            'promo' => $this->promo,
            'reference' => $this->reference,
            'photo' => $this->photo,
            'categorie' => new CategorieResource($this->categorie),
            'articleConfection' =>ArticleConfectionResource::collection($this->articleconfections),
        ];
    }
}