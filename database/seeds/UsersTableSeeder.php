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
            'name'      => 'Lucas Vinicius Pereria Lulu' ,
            'email'     => 'lucas.vinicius3@hotmail.com' ,
            'password'  => bcrypt('123') ,
            'is_master' => '1' ,
        ]);
    }
}
