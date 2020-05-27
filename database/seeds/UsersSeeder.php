<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Igor',
            'email' => 'igor.alexander.silva@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // dd($user->id);

        $user->assignRole('administrator');
        
        // $user2 = User::create([
        //     'name' => 'Fabricio',
        //     'email' => 'fabriciolpu2@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);


        // $user2->assignRole('administrator');
    }
}
