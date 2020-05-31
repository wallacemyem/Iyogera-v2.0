<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'system_name' => 'Iyogera ERP',
                'system_title' => 'Iyogera School ERP',
                'system_email' => 'admin@iyogera.com',
                'selected_branch' => 1,
                'running_session' => '1',
                'phone' => '2348067707813',
                'purchase_code' => NULL,
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar',
                'updated_at' => '2020-05-21 18:46:35',
                'created_at' => '2020-03-14 02:01:53',
            ),
        ));
        
        
    }
}