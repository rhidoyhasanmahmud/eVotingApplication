<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	ModulesTableSeeder::class,
        	PermissionsTableSeeder::class,
        	GroupsTableSeeder::class,
        	CountriesTableSeeder::class,
        	UsersTableSeeder::class,
        ]);
    }
}
