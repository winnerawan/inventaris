<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::insert([
            [
                'name' => 'Elektronika',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],

            [
                'name' => 'ATK',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
