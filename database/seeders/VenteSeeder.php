<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artventes = [
            [
                'libelle' => 'article de vente',
                'quantiteStock' => 10,
                'prix' => 10,
                'reference' => '123',
                'photo' => '',
                'categorie_id' => 1,
                'cout' => 10,
                'marge' => 10,
                'promo' => 10
            ],
            [
                'libelle' => 'article de vente',
                'quantiteStock' => 10,
                'prix' => 10,
                'reference' => '123',
                'photo' => '',
                'categorie_id' => 1,
                'cout' => 10,
                'marge' => 10,
                'promo' => 10
            ],
            [
                'libelle' => 'article de vente',
                'quantiteStock' => 10,
                'prix' => 10,
                'reference' => '123',
                'photo' => '',
                'categorie_id' => 1,
                'cout' => 10,
                'marge' => 10,
                'promo' => 10
            ],
        ];
        DB::table('article_ventes')->insert($artventes);
    }
}
