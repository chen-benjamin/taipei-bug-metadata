<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mepunkAdmin',
            'email' => 'mepunk-admin@mepunk.io',
            'password' => Hash::make('MePunkSuperUser@2021'),
        ]);
    }
}
