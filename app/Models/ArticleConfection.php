<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ArticleConfection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libelle',
        'quantiteStock',
        'prix',
        'reference',
        'photo',
        'categorie_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prix' => 'float',
        'categorie_id' => 'integer',
    ];
    
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    // public function articleFournisseurs()
    // {
    //     return $this->hasMany(ArticleFournisseur::class);
    // }

    public function fournisseurs():BelongsToMany
    {
        return $this->belongsToMany(Fournisseur::class, 'article_fournisseurs');
    }

    public function venteconfections()
    {
        return $this->hasMany(VenteConfection::class);
    }
}
