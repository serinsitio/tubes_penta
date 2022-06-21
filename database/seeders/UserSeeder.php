<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = [
            [
                'name' => 'Dosen',
                'email' => 'dosen@email.com',
                'role' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Mahasiswa',
                'email' => 'mahasiswa@email.com',
                'role' => '2',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
