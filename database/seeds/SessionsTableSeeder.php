<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sessions')->delete();
        
        \DB::table('sessions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '2019/2020',
                'school_id' => 1,
                'status' => 1,
                'created_at' => '2020-03-14 02:01:53',
                'updated_at' => '2020-03-14 02:01:53',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => '2019/2020',
                'school_id' => 6,
                'status' => 1,
                'created_at' => '2020-04-07 09:27:29',
                'updated_at' => '2020-04-07 09:30:58',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => '2020/2021',
                'school_id' => 6,
                'status' => 0,
                'created_at' => '2020-04-07 09:27:46',
                'updated_at' => '2020-04-07 09:27:46',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => '2021/2022',
                'school_id' => 6,
                'status' => 0,
                'created_at' => '2020-04-08 16:44:07',
                'updated_at' => '2020-04-08 16:44:07',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => '2019/2020',
                'school_id' => 8,
                'status' => 0,
                'created_at' => '2020-05-18 15:57:05',
                'updated_at' => '2020-05-18 15:57:05',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => '2020/2021',
                'school_id' => 1,
                'status' => 0,
                'created_at' => '2020-05-23 07:40:22',
                'updated_at' => '2020-05-23 07:40:22',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => '2020/2021',
                'school_id' => 9,
                'status' => 1,
                'created_at' => '2020-05-25 11:31:37',
                'updated_at' => '2020-05-25 11:31:37',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => '2020/2021',
                'school_id' => 10,
                'status' => 1,
                'created_at' => '2020-05-25 11:32:56',
                'updated_at' => '2020-05-25 11:32:56',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => '2020/2021',
                'school_id' => 11,
                'status' => 1,
                'created_at' => '2020-05-25 11:34:00',
                'updated_at' => '2020-05-25 11:34:00',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => '2020/2021',
                'school_id' => 12,
                'status' => 1,
                'created_at' => '2020-05-25 11:34:51',
                'updated_at' => '2020-05-25 11:34:51',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => '2020/2021',
                'school_id' => 13,
                'status' => 1,
                'created_at' => '2020-05-25 11:41:14',
                'updated_at' => '2020-05-25 11:41:14',
            ),
        ));
        
        
    }
}