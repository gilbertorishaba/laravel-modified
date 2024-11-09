<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'name' => 'Gilbert',
        'email' => 'orishaba@gmail.com',
        'password' => bcrypt('123'),
        'is_admin' => true,
       ]);
    }
}
