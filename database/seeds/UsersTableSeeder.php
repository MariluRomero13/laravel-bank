<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Adrian Gúzman',
            'role_id' => 2,
            'email' => 'adrianG@example.com',
            'password' => bcrypt('cliente'),
        ]);

        DB::table('users')->insert([
            'name' => 'Marina Montoya',
            'role_id' => 2,
            'email' => 'marinaMo@example.com',
            'password' => bcrypt('cliente'),
        ]);
    }
}
