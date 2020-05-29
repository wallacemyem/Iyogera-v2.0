<?php

use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('classes')->delete();
        
        \DB::table('classes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'SS 2',
                'school_id' => 1,
                'created_at' => '2020-04-01 22:08:04',
                'updated_at' => '2020-04-01 22:08:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'SS 2',
                'school_id' => 6,
                'created_at' => '2020-04-06 19:56:32',
                'updated_at' => '2020-04-06 19:56:32',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'SS1',
                'school_id' => 1,
                'created_at' => '2020-04-07 12:32:44',
                'updated_at' => '2020-04-07 12:32:44',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'SS3',
                'school_id' => 1,
                'created_at' => '2020-04-07 12:33:35',
                'updated_at' => '2020-04-07 12:33:35',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'SS 3',
                'school_id' => 6,
                'created_at' => '2020-04-16 15:08:02',
                'updated_at' => '2020-04-16 15:08:02',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'JSS 1',
                'school_id' => 8,
                'created_at' => '2020-05-02 13:40:51',
                'updated_at' => '2020-05-02 13:40:51',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'JSS 2',
                'school_id' => 8,
                'created_at' => '2020-05-02 13:43:16',
                'updated_at' => '2020-05-02 13:43:16',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'JSS 3',
                'school_id' => 8,
                'created_at' => '2020-05-02 13:44:25',
                'updated_at' => '2020-05-02 13:44:25',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'SS 1',
                'school_id' => 8,
                'created_at' => '2020-05-02 13:48:33',
                'updated_at' => '2020-05-02 13:48:33',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'SS 2',
                'school_id' => 8,
                'created_at' => '2020-05-02 13:57:33',
                'updated_at' => '2020-05-02 13:57:33',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'SS 3',
                'school_id' => 8,
                'created_at' => '2020-05-02 13:57:47',
                'updated_at' => '2020-05-02 13:57:47',
            ),
        ));
        
        
    }
}