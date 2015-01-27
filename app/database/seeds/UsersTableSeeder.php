<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = 'admin@troupe.com';
        $user->password = 'test';
        $user->first_name = 'Jacob';
        $user->last_name = 'Ernst';
        $user->role = 'admin';
        $user->type = 'director';
        $user->save();
        
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            User::create([
                'first_name'      => $faker->firstName($gender = null),
                'last_name'       => $faker->lastName,
                'email'           => $faker->unique()->email,
                
            ]);
        }
    }

}
