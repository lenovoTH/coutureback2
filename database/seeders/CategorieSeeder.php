<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['libelle' => 'robe', 'type' => 'article de vente'],
            ['libelle' => 'tissu', 'type' => 'article de confection'],
            ['libelle' => 'boutton', 'type' => 'article de confection'],
            ['libelle' => 'jupe', 'type' => 'article de vente'],
        ];
        DB::table('categories')->insert($categories);
    }
}
