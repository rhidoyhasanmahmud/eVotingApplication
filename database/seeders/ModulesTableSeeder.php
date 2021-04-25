<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Module;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
        	[
        		'label' => 'Modules',
        		'url' => 'modules'
        	],
            [
                'label' => 'Permissions',
                'url' => 'permissions'
            ],
        ];

        foreach ($modules as $module) {
            Module::create($module);
        }
    }
}
