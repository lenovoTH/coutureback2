<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artconfs = [
            [
                'libelle' => 'article de vente',
                'quantiteStock' => 10,
                'prix' => 10,
                'reference' => '123',
                'photo' => '',
                'categorie_id' => 1,
            ],
            [
                'libelle' => 'article de vente',
                'quantiteStock' => 10,
                'prix' => 10,
                'reference' => '123',
                'photo' => '',
                'categorie_id' => 1,
            ],
            [
                'libelle' => 'article de vente',
                'quantiteStock' => 10,
                'prix' => 10,
                'reference' => '123',
                'photo' => '',
                'categorie_id' => 1,
            ],
        ];
        DB::table('article_confections')->insert($artconfs);
    }
}
