<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sections')->delete();
        
        \DB::table('sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'A',
                'class_id' => 1,
                'school_id' => 1,
                'created_at' => '2020-04-01 22:08:04',
                'updated_at' => '2020-04-01 22:08:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'A',
                'class_id' => 2,
                'school_id' => 6,
                'created_at' => '2020-04-06 19:56:32',
                'updated_at' => '2020-04-06 19:56:32',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'A',
                'class_id' => 3,
                'school_id' => 1,
                'created_at' => '2020-04-07 12:32:44',
                'updated_at' => '2020-04-07 12:32:44',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'B',
                'class_id' => 3,
                'school_id' => 1,
                'created_at' => '2020-04-07 12:33:10',
                'updated_at' => '2020-04-07 12:33:10',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'B',
                'class_id' => 1,
                'school_id' => 1,
                'created_at' => '2020-04-07 12:33:22',
                'updated_at' => '2020-04-07 12:33:22',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'A',
                'class_id' => 4,
                'school_id' => 1,
                'created_at' => '2020-04-07 12:33:35',
                'updated_at' => '2020-04-07 12:33:35',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'B',
                'class_id' => 4,
                'school_id' => 1,
                'created_at' => '2020-04-07 12:33:48',
                'updated_at' => '2020-04-07 12:33:48',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'A',
                'class_id' => 5,
                'school_id' => 6,
                'created_at' => '2020-04-16 15:08:02',
                'updated_at' => '2020-04-16 15:08:02',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'A',
                'class_id' => 6,
                'school_id' => 8,
                'created_at' => '2020-05-02 13:40:51',
                'updated_at' => '2020-05-02 13:40:51',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'A',
                'class_id' => 7,
                'school_id' => 8,
                'created_at' => '2020-05-02 13:43:16',
                'updated_at' => '2020-05-02 13:43:16',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'A',
                'class_id' => 8,
                'school_id' => 8,
                'created_at' => '2020-05-02 13:44:25',
                'updated_at' => '2020-05-02 13:44:25',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'A',
                'class_id' => 9,
                'school_id' => 8,
                'created_at' => '2020-05-02 13:48:33',
                'updated_at' => '2020-05-02 13:48:33',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'A',
                'class_id' => 10,
                'school_id' => 8,
                'created_at' => '2020-05-02 13:57:33',
                'updated_at' => '2020-05-02 13:57:33',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'A',
                'class_id' => 11,
                'school_id' => 8,
                'created_at' => '2020-05-02 13:57:47',
                'updated_at' => '2020-05-02 13:57:47',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'A',
                'class_id' => 12,
                'school_id' => 6,
                'created_at' => '2020-05-21 12:47:28',
                'updated_at' => '2020-05-21 12:47:28',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'A',
                'class_id' => 13,
                'school_id' => 6,
                'created_at' => '2020-05-21 12:52:53',
                'updated_at' => '2020-05-21 12:52:53',
            ),
        ));
        
        
    }
}