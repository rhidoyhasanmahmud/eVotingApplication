<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
        	[
        		'name' => 'System Admin',
        		'display' => 0
        	],
        	[
        		'name' => 'Polling Station',
        		'display' => 1
        	],
            [
                'name' => 'Voter',
                'display' => 1
            ]
        ];
        foreach ($groups as $group) {
            Group::create($group);
        }

    }
}
