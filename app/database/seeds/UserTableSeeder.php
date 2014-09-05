<?php

class UserTableSeeder extends Seeder {

    public function run() {

        // DB::table('user')->truncate();

        $user = array(
            'username' => 'admin',
            'password' => Hash::make('password'),
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()'),
        );

        DB::table('users')->insert($user);
    }
}