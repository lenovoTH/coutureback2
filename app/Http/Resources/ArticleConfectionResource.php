<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CategorieResource;
use App\Http\Resources\FournisseurResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleConfectionResource extends JsonResource
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
            'reference' => $this->reference,
            'photo' => $this->photo,
            'categorie' => new CategorieResource($this->categorie),
            'fournisseurs' => FournisseurResource::collection($this->fournisseurs),
        ];
    }
}

