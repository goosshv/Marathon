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
            'role_id' => '1',
            'name' => 'Gaukhar',
            'email' => 'Goosshv@mail.ru',
            'password' => bcrypt('12345678')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Runner',
            'email' => 'runner@mgail.ru',
            'password' => bcrypt('12345678')
        ]);
    }
}
