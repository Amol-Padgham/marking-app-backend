<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    public function run()
    {
        DB::table('staff')->insert([
            [
                'StaffID' => 1, 
                'name' => 'John Doe', 
                'email' => 'john@example.com', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'StaffID' => 2, 
                'name' => 'Jane Smith', 
                'email' => 'jane@example.com', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ]);
    }
}
