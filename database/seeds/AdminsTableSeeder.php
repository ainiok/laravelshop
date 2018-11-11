<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Model\Admin::create([
            'name' => 'Administrator',
            'email' => 'admin@ainiok.com',
            'phone' => '13148885200',
            'password' => '123456',
            'uuid' => uuid()
        ]);
    }
}
