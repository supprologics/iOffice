<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','vishvawm@gmail.com')->first();
        if(!$user){
            $user=User::create([
                'name'=>'Vishva Madumal',
                'email'=>'vishvawm@gmail.com',
                'password'=>Hash::make('12345678'),
                'role'=>'Admin',
                'about'=>'Main User',
                'online'=>1,
            ]);
        }
    }
}
