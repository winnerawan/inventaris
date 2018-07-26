<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([

            [
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'program_id' => 1
            ],
            [
                'name' => 'Unit Inventaris',
                'email' => 'unit@unipma.ac.id',
                'password' => bcrypt('unit'),
                'role' => 'unit',
                'program_id' => 1
            ],
            [
                'name' => 'Teknik Informatika',
                'email' => 'informatika@unipma.ac.id',
                'password' => bcrypt('informatika'),
                'role' => 'program_study',
                'program_id' => 1
            ],
            [
                'name' => 'Teknik Elektronika',
                'email' => 'elektronika@unipma.ac.id',
                'password' => bcrypt('elektronika'),
                'role' => 'program_study',
                'program_id' => 2
            ],
            [
                'name' => 'Teknik Industri',
                'email' => 'industri@unipma.ac.id',
                'password' => bcrypt('industri'),
                'role' => 'program_study',
                'program_id' => 3
            ]
        ]);
    }
}
