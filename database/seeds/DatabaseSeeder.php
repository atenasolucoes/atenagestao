<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome' =>   'Herbet Junior',
            'email' => 'herbetjr@gmail.com',
            'senha' => bcrypt('01072015'),
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
