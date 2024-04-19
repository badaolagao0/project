<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'display_name' => 'Quan tri he thong'],
            ['name' => 'guest', 'display_name' => 'Khach hang'],
            ['name' => 'developer', 'display_name' => 'Phat trien he thong'],
            ['name' => 'content', 'display_name' => 'Chinh sua noi dung'],
        ]);
    }
}