<?php

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
        $user->save();
    }

}
