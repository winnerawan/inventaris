<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Program::insert([
            [
                'name' => 'Teknik Informatika',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],

            [
                'name' => 'Teknik Elektronika',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'Teknik Industri',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
