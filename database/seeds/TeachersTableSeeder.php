<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teachers')->delete();
        
        \DB::table('teachers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 5,
                'department_id' => 1,
                'designation' => 'Head Marker',
                'school_id' => 1,
                'created_at' => '2020-04-01 23:40:58',
                'updated_at' => '2020-04-01 23:40:58',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 7,
                'department_id' => 2,
                'designation' => 'Teacher',
                'school_id' => 6,
                'created_at' => '2020-04-06 20:00:06',
                'updated_at' => '2020-04-06 20:00:06',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 16,
                'department_id' => 1,
                'designation' => 'English Teacher',
                'school_id' => 1,
                'created_at' => '2020-04-07 12:37:27',
                'updated_at' => '2020-04-07 12:37:27',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 23,
                'department_id' => 2,
                'designation' => 'Teacher',
                'school_id' => 6,
                'created_at' => '2020-04-29 22:20:24',
                'updated_at' => '2020-04-29 22:20:24',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 28,
                'department_id' => 4,
                'designation' => 'Physics',
                'school_id' => 1,
                'created_at' => '2020-04-30 16:40:37',
                'updated_at' => '2020-04-30 16:40:37',
            ),
        ));
        
        
    }
}