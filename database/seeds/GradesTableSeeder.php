<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('grades')->delete();
        
        \DB::table('grades')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'A',
                'grade_point' => '4.0',
                'mark_from' => '70',
                'mark_upto' => '100',
                'comment' => 'Excellent',
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-01 23:34:29',
                'updated_at' => '2020-04-01 23:34:29',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'B',
                'grade_point' => '3.5',
                'mark_from' => '55',
                'mark_upto' => '69',
                'comment' => 'Very Good',
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-01 23:35:08',
                'updated_at' => '2020-04-01 23:35:08',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'C',
                'grade_point' => '3.0',
                'mark_from' => '45',
                'mark_upto' => '54',
                'comment' => 'Good',
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-01 23:35:54',
                'updated_at' => '2020-04-01 23:35:54',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'D',
                'grade_point' => '2.5',
                'mark_from' => '35',
                'mark_upto' => '44',
                'comment' => 'Fair',
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-01 23:36:22',
                'updated_at' => '2020-04-01 23:36:22',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'E',
                'grade_point' => '1.0',
                'mark_from' => '0',
                'mark_upto' => '34',
                'comment' => 'Failed',
                'school_id' => 1,
                'session' => '1',
                'created_at' => '2020-04-01 23:36:56',
                'updated_at' => '2020-04-01 23:36:56',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'B',
                'grade_point' => '3.0',
                'mark_from' => '70',
                'mark_upto' => '65',
                'comment' => 'Very Good',
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-06 20:02:42',
                'updated_at' => '2020-04-06 20:02:42',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'A',
                'grade_point' => '4.0',
                'mark_from' => '80',
                'mark_upto' => '100',
                'comment' => 'Excellent',
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-06 20:10:00',
                'updated_at' => '2020-04-06 20:10:00',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'C',
                'grade_point' => '2.5',
                'mark_from' => '64',
                'mark_upto' => '54',
                'comment' => 'Good',
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-06 20:10:35',
                'updated_at' => '2020-04-06 20:11:52',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'D',
                'grade_point' => '2.0',
                'mark_from' => '44',
                'mark_upto' => '53',
                'comment' => 'Fair',
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-06 20:11:44',
                'updated_at' => '2020-04-06 20:11:44',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'E',
                'grade_point' => '1.0',
                'mark_from' => '30',
                'mark_upto' => '43',
                'comment' => 'fail',
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-06 20:12:34',
                'updated_at' => '2020-04-06 20:12:34',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'F',
                'grade_point' => '0.0',
                'mark_from' => '0',
                'mark_upto' => '29',
                'comment' => 'Failed',
                'school_id' => 6,
                'session' => '3',
                'created_at' => '2020-04-06 20:13:00',
                'updated_at' => '2020-04-06 20:13:00',
            ),
        ));
        
        
    }
}