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
            'name' => 'bugAdmin',
            'email' => 'bug-admin@taipeibug.club',
            'password' => Hash::make('bugSuperUser@2021'),
        ]);
    }
}
