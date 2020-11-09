<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('languages')->delete();
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'English',
                'code' => 'en',
                'created_at' => '2019-01-22 08:25:16',
                'updated_at' => '2019-01-22 08:25:16',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Spanish',
                'code' => 'es',
                'created_at' => '2020-05-01 18:56:27',
                'updated_at' => '2020-05-01 18:56:27',
            ),
        ));
        
        
    }
}