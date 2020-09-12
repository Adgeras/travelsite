<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mindaugas',
            'email' => 'mindaugas@gmail.com',
            'password' => Hash::make('mindaugas'),
        ]);

        DB::table('users')->insert([
            'name' => 'Edgaras',
            'email' => 'edgaras.banaitis@gmail.com',
            'password' => Hash::make('edgaras'),
        ]);
    }
}
