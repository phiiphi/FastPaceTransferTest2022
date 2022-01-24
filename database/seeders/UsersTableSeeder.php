<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
                'id'                => 1,
                'name'              => 'Super Admin',
                'email'             => 'admin@fastpacetransfer.com',
                'email_verified_at' => '2022-01-22 14:00:26',
                'password'          => '$2y$10$qyxYm.2dlaXROvs0OrGHseo4qbeissRMqNWdhlcr/vUqE62vN94Fi',
                'phone'             => '024444000',
                'user_type'         => 'Admin',
                'remember_token'    => null,
                'created_at'        => '2022-01-22 14:00:26',
                'updated_at'        => '2022-01-22 14:00:26',
            ],
             [
                'id'                => 2,
                'name'              => 'John Doe',
                'email'             => 'johndoe@gmail.com',
                'email_verified_at' => '2022-01-22 14:00:26',
                'password'          => '$2y$10$qyxYm.2dlaXROvs0OrGHseo4qbeissRMqNWdhlcr/vUqE62vN94Fi',
                'phone'             => '0244440088',
                'user_type'         => 'Student',
                'remember_token'    => null,
                'created_at'        => '2022-01-22 14:00:26',
                'updated_at'        => '2022-01-22 14:00:26',
            ],
            [
                'id'                => 3,
                'name'              => 'Jane Doe',
                'email'             => 'janedoe@gmail.com',
                'email_verified_at' => '2022-01-22 14:00:26',
                'password'          => '$2y$10$qyxYm.2dlaXROvs0OrGHseo4qbeissRMqNWdhlcr/vUqE62vN94Fi',
                'phone'             => '0244240088',
                'user_type'         => 'Student',
                'remember_token'    => null,
                'created_at'        => '2022-01-22 14:00:26',
                'updated_at'        => '2022-01-22 14:00:26',
            ],
             [
                'id'                => 4,
                'name'              => 'Ciri King',
                'email'             => 'ciriking21@gmail.com',
                'email_verified_at' => '2022-01-22 14:00:26',
                'password'          => '$2y$10$qyxYm.2dlaXROvs0OrGHseo4qbeissRMqNWdhlcr/vUqE62vN94Fi',
                'phone'             => '0243240088',
                'user_type'         => 'Student',
                'remember_token'    => null,
                'created_at'        => '2022-01-22 14:00:26',
                'updated_at'        => '2022-01-22 14:00:26',
            ],
        ];

        User::insert($users);


    }
}
