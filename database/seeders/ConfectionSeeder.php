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
                'libelle' => 'boutton',
                'quantiteStock' => 10,
                'prix' => 10,
                'reference' => '123',
                // 'photo' => '',
                'categorie_id' => 1,
            ],
            [
                'libelle' => 'fil',
                'quantiteStock' => 10,
                'prix' => 10,
                'reference' => '123',
                // 'photo' => '',
                'categorie_id' => 1,
            ],
            [
                'libelle' => 'tissu',
                'quantiteStock' => 10,
                'prix' => 10,
                'reference' => '123',
                // 'photo' => '',
                'categorie_id' => 1,
            ],
        ];
        DB::table('article_confections')->insert($artconfs);
    }
}
