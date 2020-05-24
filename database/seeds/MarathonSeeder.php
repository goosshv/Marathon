<?php

use Illuminate\Database\Seeder;

class MarathonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marathons')->insert([
            'id' => '1',
            'name' => 'Almaty Marathon',
            'date' => '2020-05-09',
            'length' => '13'
        ]);

        DB::table('marathons')->insert([
            'id' => '2',
            'name' => 'Nur Marathon',
            'date' => '2020-06-09',
            'length' => '16'
        ]);
    }
}
