<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'info@nordean.com.tr'],
            [
                'name' => 'Admin',
                'email' => 'info@nordean.com.tr',
                'password' => \Hash::make('Beril2021#'),
                'is_admin' => true,
            ]
        );
    }
}
