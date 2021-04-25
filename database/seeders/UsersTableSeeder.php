<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'name' => 'System Admin',
        		'email' => 'admin@evote.com',
        		'password' => Hash::make('123456'),
                'province' => 'Province',
                'constituency' => 'Constituency',
                'sub_county' => 'Sub County',
        		'is_system_user' => 1,
                'country_id' => 1,
        		'group_id' => 1,
        	],
        	[
        		'name' => 'Polling Station',
        		'email' => 'polling.station@evote.com',
        		'password' => Hash::make('123456'),
                'province' => 'Province',
                'constituency' => 'Constituency',
                'sub_county' => 'Sub County',
        		'is_system_user' => 0,
                'country_id' => 1,
        		'group_id' => 2,
        	],
            [
        		'name' => 'voter',
        		'email' => 'voter@evote.com',
        		'password' => Hash::make('123456'),
                'province' => 'Province',
                'constituency' => 'Constituency',
                'sub_county' => 'Sub County',
        		'is_system_user' => 0,
                'country_id' => 1,
        		'group_id' => 3,
        	]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
