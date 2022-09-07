<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUsers = [

            [
                'id'=>'1',
                'name'=>'Developer',
                'email'=>'dev@talenthire.com',
                'phone'=>'01700000000',
                'user_role'=>User::DEVELOPER,
                'status'=>User::APPROVED,
                'password'=>bcrypt('12345678'),
                'created_at'=>Date('Y-m-d h:i:s'),
                'updated_at'=>Date('Y-m-d h:i:s')
            ],
            [
                'id'=>'2',
                'name'=>'Admin',
                'email'=>'admin@talenthire.com',
                'phone'=>'01800000000',
                'user_role'=>User::ADMIN,
                'status'=>User::APPROVED,
                'password'=>bcrypt('12345678'),
                'created_at'=>Date('Y-m-d h:i:s'),
                'updated_at'=>Date('Y-m-d h:i:s')
            ],
            [
                'id'=>'3',
                'name'=>'General User ',
                'email'=>'user@talenthire.com',
                'phone'=>'01600000000',
                'user_role'=>User::GENERALUSER,
                'status'=>User::APPROVED,
                'password'=>bcrypt('12345678'),
                'created_at'=>Date('Y-m-d h:i:s'),
                'updated_at'=>Date('Y-m-d h:i:s')
            ]

        ];

        $adminUser=\App\Models\User::first();

        if (empty($adminUser)){
            \App\Models\User::insert($adminUsers);
        }
    }
}
