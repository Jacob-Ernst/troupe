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
        $user->gender = 'm';
        $user->date_of_birth = '1994-12-27';
        $user->save();
        
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            User::create([
                'first_name'      => $faker->firstName($gender = null),
                'last_name'       => $faker->lastName,
                'email'           => $faker->unique()->email,
                'password'        => Hash::make('test'),
                'date_of_birth'   => $faker->date($format = 'Y-m-d', $max = '2006-00-00'),
                'gender'          => $faker->randomElement($array = ['m','f', 'o', 'p']),
                'type'            => $faker->randomElement($array = ['director','actor', 'writer', 'artist']),
                'role'            => 'user'
            ]);
        }
    }

}
