<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Admin',
            'last_name' => '',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 1
        ]);
    }
}
