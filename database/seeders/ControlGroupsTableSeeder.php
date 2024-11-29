<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ControlGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('control_groups')->delete();
        
        \DB::table('control_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Organizational Controls',
                'description' => NULL,
                'created_at' => '2024-11-18 08:06:29',
                'updated_at' => '2024-11-18 08:06:29',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'People Controls',
                'description' => NULL,
                'created_at' => '2024-11-18 08:06:36',
                'updated_at' => '2024-11-18 08:06:36',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Physical Controls',
                'description' => NULL,
                'created_at' => '2024-11-18 08:06:41',
                'updated_at' => '2024-11-18 08:06:41',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Technological Controls',
                'description' => NULL,
                'created_at' => '2024-11-18 08:06:51',
                'updated_at' => '2024-11-18 08:06:51',
            ),
        ));
        
        
    }
}