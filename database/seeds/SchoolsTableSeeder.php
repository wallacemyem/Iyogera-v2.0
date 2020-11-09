<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('schools')->delete();
        
        \DB::table('schools')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Iyogera Schools',
                'session' => '1',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar',
                'phone' => '08067707813',
                'short' => 'iyogera',
                'country' => 'NG',
                'currency' => 'NGN',
                'license' => NULL,
                'created_at' => '2020-03-14 02:01:53',
                'updated_at' => '2020-05-23 07:38:50',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'NKST College, Mkar',
                'session' => '3',
                'address' => 'DadaGonoyi Crescent',
                'phone' => '08068256917',
                'short' => 'nkstcmkar',
                'country' => 'NG',
                'currency' => 'NGN',
                'license' => NULL,
                'created_at' => '2020-04-05 13:42:30',
                'updated_at' => '2020-04-29 20:48:43',
            ),
            2 => 
            array (
                'id' => 8,
                'name' => 'Special gifted school',
                'session' => '6',
                'address' => 'Mkar gboko',
                'phone' => '8024313854',
                'short' => 'SGS',
                'country' => 'NG',
                'currency' => 'NGN',
                'license' => NULL,
                'created_at' => '2020-04-30 17:39:45',
                'updated_at' => '2020-05-17 09:01:01',
            ),
            3 => 
            array (
                'id' => 13,
                'name' => 'Sky Gifted, Maitama',
                'session' => '12',
                'address' => 'That home at Maitama',
                'phone' => '09056987125',
                'short' => NULL,
                'country' => 'NG',
                'currency' => 'NGN',
                'license' => NULL,
                'created_at' => '2020-05-25 11:41:14',
                'updated_at' => '2020-05-25 13:26:31',
            ),
        ));
        
        
    }
}