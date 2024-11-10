<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'name' => 'Gilbert Orishaba',
        'faculty'=>'Faculty of Computing',
        'email' => 'gilbertorishaba4@gmail.com',
        'password' => bcrypt('Gilbert@2022')
       ]);
    }
}
