<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
        	[
        		'name' => 'Kenya',
        		'display' => 1
        	],
        	[
        		'name' => 'USA',
        		'display' => 1
        	],
            [
                'name' => 'Bangladesh',
                'display' => 1
            ]
        ];
        foreach ($countries as $country) {
            Country::create($country);
        }

    }
}
