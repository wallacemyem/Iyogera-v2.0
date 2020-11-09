<?php

use Illuminate\Database\Seeder;

class EnrollsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('enrolls')->delete();
        
        \DB::table('enrolls')->insert(array (
            0 => 
            array (
                'id' => 2,
                'student_id' => 2,
                'class_id' => 1,
                'section_id' => 1,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-01 22:57:45',
                'updated_at' => '2020-04-01 22:57:45',
            ),
            1 => 
            array (
                'id' => 4,
                'student_id' => 4,
                'class_id' => 2,
                'section_id' => 2,
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-07 10:26:22',
                'updated_at' => '2020-04-16 15:08:50',
            ),
            2 => 
            array (
                'id' => 5,
                'student_id' => 5,
                'class_id' => 2,
                'section_id' => 2,
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-07 10:58:20',
                'updated_at' => '2020-04-07 10:58:20',
            ),
            3 => 
            array (
                'id' => 8,
                'student_id' => 8,
                'class_id' => 2,
                'section_id' => 2,
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-07 11:01:18',
                'updated_at' => '2020-04-07 11:01:18',
            ),
            4 => 
            array (
                'id' => 9,
                'student_id' => 9,
                'class_id' => 2,
                'section_id' => 2,
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-07 12:09:11',
                'updated_at' => '2020-04-16 15:13:37',
            ),
            5 => 
            array (
                'id' => 10,
                'student_id' => 10,
                'class_id' => 1,
                'section_id' => 1,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-07 12:32:06',
                'updated_at' => '2020-04-07 12:32:06',
            ),
            6 => 
            array (
                'id' => 11,
                'student_id' => 11,
                'class_id' => 3,
                'section_id' => 3,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-07 12:46:15',
                'updated_at' => '2020-04-07 12:46:15',
            ),
            7 => 
            array (
                'id' => 12,
                'student_id' => 12,
                'class_id' => 5,
                'section_id' => 8,
                'school_id' => 6,
                'session' => '4',
                'created_at' => '2020-04-28 06:53:05',
                'updated_at' => '2020-05-21 13:36:43',
            ),
            8 => 
            array (
                'id' => 13,
                'student_id' => 13,
                'class_id' => 5,
                'section_id' => 8,
                'school_id' => 6,
                'session' => '4',
                'created_at' => '2020-04-28 07:11:13',
                'updated_at' => '2020-05-21 13:37:56',
            ),
            9 => 
            array (
                'id' => 14,
                'student_id' => 14,
                'class_id' => 3,
                'section_id' => 4,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            10 => 
            array (
                'id' => 15,
                'student_id' => 15,
                'class_id' => 3,
                'section_id' => 4,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            11 => 
            array (
                'id' => 16,
                'student_id' => 16,
                'class_id' => 3,
                'section_id' => 4,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            12 => 
            array (
                'id' => 17,
                'student_id' => 17,
                'class_id' => 3,
                'section_id' => 4,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-30 16:36:27',
                'updated_at' => '2020-04-30 16:36:27',
            ),
            13 => 
            array (
                'id' => 18,
                'student_id' => 18,
                'class_id' => 1,
                'section_id' => 1,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-01 20:28:16',
                'updated_at' => '2020-05-01 20:28:16',
            ),
            14 => 
            array (
                'id' => 19,
                'student_id' => 19,
                'class_id' => 4,
                'section_id' => 6,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-14 12:04:50',
                'updated_at' => '2020-05-14 12:04:50',
            ),
            15 => 
            array (
                'id' => 20,
                'student_id' => 20,
                'class_id' => 6,
                'section_id' => 9,
                'school_id' => 8,
                'session' => '6',
                'created_at' => '2020-05-17 09:00:27',
                'updated_at' => '2020-05-17 09:00:27',
            ),
            16 => 
            array (
                'id' => 21,
                'student_id' => 21,
                'class_id' => 1,
                'section_id' => 5,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-19 23:13:11',
                'updated_at' => '2020-05-19 23:13:11',
            ),
            17 => 
            array (
                'id' => 22,
                'student_id' => 22,
                'class_id' => 1,
                'section_id' => 5,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-19 23:13:12',
                'updated_at' => '2020-05-19 23:13:12',
            ),
            18 => 
            array (
                'id' => 26,
                'student_id' => 26,
                'class_id' => 5,
                'section_id' => 8,
                'school_id' => 6,
                'session' => '4',
                'created_at' => '2020-05-21 09:15:48',
                'updated_at' => '2020-05-21 13:38:00',
            ),
            19 => 
            array (
                'id' => 31,
                'student_id' => 31,
                'class_id' => 3,
                'section_id' => 3,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-21 09:48:01',
                'updated_at' => '2020-05-21 09:48:01',
            ),
            20 => 
            array (
                'id' => 32,
                'student_id' => 32,
                'class_id' => 5,
                'section_id' => 8,
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-05-21 16:53:07',
                'updated_at' => '2020-05-21 16:53:07',
            ),
            21 => 
            array (
                'id' => 33,
                'student_id' => 33,
                'class_id' => 5,
                'section_id' => 8,
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-05-21 16:53:07',
                'updated_at' => '2020-05-21 16:53:07',
            ),
            22 => 
            array (
                'id' => 34,
                'student_id' => 34,
                'class_id' => 5,
                'section_id' => 8,
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-05-21 16:53:07',
                'updated_at' => '2020-05-21 16:53:07',
            ),
            23 => 
            array (
                'id' => 35,
                'student_id' => 35,
                'class_id' => 2,
                'section_id' => 2,
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-05-27 16:51:39',
                'updated_at' => '2020-05-27 16:51:39',
            ),
            24 => 
            array (
                'id' => 36,
                'student_id' => 36,
                'class_id' => 2,
                'section_id' => 2,
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-05-27 16:56:07',
                'updated_at' => '2020-05-27 16:56:07',
            ),
            25 => 
            array (
                'id' => 37,
                'student_id' => 37,
                'class_id' => 1,
                'section_id' => 1,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-28 08:49:30',
                'updated_at' => '2020-05-28 08:49:30',
            ),
            26 => 
            array (
                'id' => 38,
                'student_id' => 38,
                'class_id' => 1,
                'section_id' => 1,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-28 08:51:33',
                'updated_at' => '2020-05-28 08:51:33',
            ),
            27 => 
            array (
                'id' => 39,
                'student_id' => 39,
                'class_id' => 1,
                'section_id' => 1,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-28 08:57:14',
                'updated_at' => '2020-05-28 08:57:14',
            ),
            28 => 
            array (
                'id' => 41,
                'student_id' => 41,
                'class_id' => 1,
                'section_id' => 1,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-28 09:31:38',
                'updated_at' => '2020-05-28 09:31:38',
            ),
            29 => 
            array (
                'id' => 42,
                'student_id' => 42,
                'class_id' => 1,
                'section_id' => 1,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-28 09:33:07',
                'updated_at' => '2020-05-28 09:33:07',
            ),
            30 => 
            array (
                'id' => 43,
                'student_id' => 43,
                'class_id' => 3,
                'section_id' => 3,
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-05-28 09:33:24',
                'updated_at' => '2020-05-28 09:33:24',
            ),
        ));
        
        
    }
}