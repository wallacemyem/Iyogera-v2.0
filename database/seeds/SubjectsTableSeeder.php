<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subjects')->delete();
        
        \DB::table('subjects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Mathematics',
                'short_name' => 'MTH',
                'school_id' => 1,
                'class_id' => 1,
                'session' => '1',
                'teacher_id' => 1,
                'created_at' => '2020-04-01 22:47:24',
                'updated_at' => '2020-04-01 22:47:24',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'English Language',
                'short_name' => 'ENG',
                'school_id' => 1,
                'class_id' => 1,
                'session' => '1',
                'teacher_id' => 1,
                'created_at' => '2020-04-01 22:47:35',
                'updated_at' => '2020-04-01 22:47:35',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Economics',
                'short_name' => 'ECO',
                'school_id' => 1,
                'class_id' => 1,
                'session' => '1',
                'teacher_id' => 3,
                'created_at' => '2020-04-01 22:47:48',
                'updated_at' => '2020-04-27 20:49:53',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Motor Mechanics',
                'short_name' => 'MOM',
                'school_id' => 6,
                'class_id' => 2,
                'session' => '3',
                'teacher_id' => 2,
                'created_at' => '2020-04-06 19:57:00',
                'updated_at' => '2020-04-06 19:57:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'National Values',
                'short_name' => 'NAV',
                'school_id' => 6,
                'class_id' => 2,
                'session' => '3',
                'teacher_id' => 2,
                'created_at' => '2020-04-06 19:57:14',
                'updated_at' => '2020-04-06 19:57:14',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Basic Science and Technical',
                'short_name' => 'BST',
                'school_id' => 6,
                'class_id' => 2,
                'session' => '3',
                'teacher_id' => 4,
                'created_at' => '2020-04-07 10:05:54',
                'updated_at' => '2020-05-20 20:56:29',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Physics',
                'short_name' => 'PHY',
                'school_id' => 1,
                'class_id' => 1,
                'session' => '1',
                'teacher_id' => 3,
                'created_at' => '2020-04-07 12:43:07',
                'updated_at' => '2020-04-19 15:41:50',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Chemistry',
                'short_name' => 'CHM',
                'school_id' => 1,
                'class_id' => 1,
                'session' => '1',
                'teacher_id' => 3,
                'created_at' => '2020-04-07 12:43:26',
                'updated_at' => '2020-04-19 15:42:05',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Biology',
                'short_name' => 'BIO',
                'school_id' => 1,
                'class_id' => 1,
                'session' => '1',
                'teacher_id' => 1,
                'created_at' => '2020-04-07 12:44:14',
                'updated_at' => '2020-04-27 20:40:55',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Marketing',
                'short_name' => 'MKT',
                'school_id' => 1,
                'class_id' => 1,
                'session' => '1',
                'teacher_id' => 3,
                'created_at' => '2020-04-19 15:39:08',
                'updated_at' => '2020-04-19 15:39:08',
            ),
        ));
        
        
    }
}