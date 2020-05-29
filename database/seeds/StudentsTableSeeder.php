<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('students')->delete();
        
        \DB::table('students')->insert(array (
            0 => 
            array (
                'id' => 2,
                'code' => '2009ade',
                'user_id' => 4,
                'profile_pix' => '2009ade',
                'school_id' => 1,
                'created_at' => '2020-04-01 22:57:45',
                'updated_at' => '2020-04-01 22:57:45',
            ),
            1 => 
            array (
                'id' => 4,
                'code' => 'nkstcm/2020/08645',
                'user_id' => 9,
                'profile_pix' => 'nkstcm202008645',
                'school_id' => 6,
                'created_at' => '2020-04-07 10:26:22',
                'updated_at' => '2020-04-07 10:26:22',
            ),
            2 => 
            array (
                'id' => 5,
                'code' => 'nkstcmkar/2020/5',
                'user_id' => 10,
                'profile_pix' => 'nkstcmkar20205',
                'school_id' => 6,
                'created_at' => '2020-04-07 10:58:20',
                'updated_at' => '2020-04-07 10:58:20',
            ),
            3 => 
            array (
                'id' => 8,
                'code' => 'nkstcmkar/2020/44032',
                'user_id' => 13,
                'profile_pix' => 'nkstcmkar202044032',
                'school_id' => 6,
                'created_at' => '2020-04-07 11:01:18',
                'updated_at' => '2020-04-07 11:01:18',
            ),
            4 => 
            array (
                'id' => 9,
                'code' => 'nkstcmkar/2020/73968',
                'user_id' => 14,
                'profile_pix' => 'nkstcmkar202073968',
                'school_id' => 6,
                'created_at' => '2020-04-07 12:09:11',
                'updated_at' => '2020-04-07 12:09:11',
            ),
            5 => 
            array (
                'id' => 10,
                'code' => 'iyo/2020/39974',
                'user_id' => 15,
                'profile_pix' => 'iyo202039974',
                'school_id' => 1,
                'created_at' => '2020-04-07 12:32:06',
                'updated_at' => '2020-04-07 12:32:06',
            ),
            6 => 
            array (
                'id' => 11,
                'code' => 'iyo/2020/75833',
                'user_id' => 18,
                'profile_pix' => 'iyo202075833',
                'school_id' => 1,
                'created_at' => '2020-04-07 12:46:15',
                'updated_at' => '2020-04-07 12:46:15',
            ),
            7 => 
            array (
                'id' => 12,
                'code' => 'nkstcmkar/2020/95074',
                'user_id' => 20,
                'profile_pix' => 'nkstcmkar202095074',
                'school_id' => 6,
                'created_at' => '2020-04-28 06:53:05',
                'updated_at' => '2020-04-28 06:53:05',
            ),
            8 => 
            array (
                'id' => 13,
                'code' => 'nkstcmkar/2020/38088',
                'user_id' => 21,
                'profile_pix' => 'nkstcmkar202038088',
                'school_id' => 6,
                'created_at' => '2020-04-28 07:11:13',
                'updated_at' => '2020-04-28 07:11:13',
            ),
            9 => 
            array (
                'id' => 14,
                'code' => 'iyo/2020/06814',
                'user_id' => 24,
                'profile_pix' => 'iyo202006814',
                'school_id' => 1,
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            10 => 
            array (
                'id' => 15,
                'code' => 'iyo/2020/61566',
                'user_id' => 25,
                'profile_pix' => 'iyo202061566',
                'school_id' => 1,
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            11 => 
            array (
                'id' => 16,
                'code' => 'iyo/2020/70906',
                'user_id' => 26,
                'profile_pix' => 'iyo202070906',
                'school_id' => 1,
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            12 => 
            array (
                'id' => 17,
                'code' => 'iyo/2020/85503',
                'user_id' => 27,
                'profile_pix' => 'iyo202085503',
                'school_id' => 1,
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            13 => 
            array (
                'id' => 18,
                'code' => 'iyo/2020/97599',
                'user_id' => 30,
                'profile_pix' => 'iyo202097599',
                'school_id' => 1,
                'created_at' => '2020-05-01 20:28:16',
                'updated_at' => '2020-05-01 20:28:16',
            ),
            14 => 
            array (
                'id' => 19,
                'code' => 'iyo/2020/80046',
                'user_id' => 31,
                'profile_pix' => 'iyo202080046',
                'school_id' => 1,
                'created_at' => '2020-05-14 12:04:50',
                'updated_at' => '2020-05-14 12:04:50',
            ),
            15 => 
            array (
                'id' => 20,
                'code' => '/2020/91487',
                'user_id' => 32,
                'profile_pix' => '202091487',
                'school_id' => 8,
                'created_at' => '2020-05-17 09:00:27',
                'updated_at' => '2020-05-17 09:00:27',
            ),
            16 => 
            array (
                'id' => 21,
                'code' => 'iyo/2020/81967',
                'user_id' => 33,
                'profile_pix' => 'iyo202081967',
                'school_id' => 1,
                'created_at' => '2020-05-19 23:13:11',
                'updated_at' => '2020-05-19 23:13:11',
            ),
            17 => 
            array (
                'id' => 22,
                'code' => 'iyo/2020/39673',
                'user_id' => 34,
                'profile_pix' => 'iyo202039673',
                'school_id' => 1,
                'created_at' => '2020-05-19 23:13:12',
                'updated_at' => '2020-05-19 23:13:12',
            ),
            18 => 
            array (
                'id' => 26,
                'code' => 'nkstcmkar/2020/22221',
                'user_id' => 38,
                'profile_pix' => 'nkstcmkar202022221',
                'school_id' => 6,
                'created_at' => '2020-05-21 09:15:48',
                'updated_at' => '2020-05-21 09:15:48',
            ),
            19 => 
            array (
                'id' => 31,
                'code' => 'iyo/2020/58436',
                'user_id' => 43,
                'profile_pix' => 'iyo202058436',
                'school_id' => 1,
                'created_at' => '2020-05-21 09:48:01',
                'updated_at' => '2020-05-21 09:48:01',
            ),
            20 => 
            array (
                'id' => 32,
                'code' => 'nkstcmkar/2020/23968',
                'user_id' => 47,
                'profile_pix' => 'nkstcmkar202023968',
                'school_id' => 6,
                'created_at' => '2020-05-21 16:53:07',
                'updated_at' => '2020-05-21 16:53:07',
            ),
            21 => 
            array (
                'id' => 33,
                'code' => 'nkstcmkar/2020/60329',
                'user_id' => 48,
                'profile_pix' => 'nkstcmkar202060329',
                'school_id' => 6,
                'created_at' => '2020-05-21 16:53:07',
                'updated_at' => '2020-05-21 16:53:07',
            ),
            22 => 
            array (
                'id' => 34,
                'code' => 'nkstcmkar/2020/88354',
                'user_id' => 49,
                'profile_pix' => 'nkstcmkar202088354',
                'school_id' => 6,
                'created_at' => '2020-05-21 16:53:07',
                'updated_at' => '2020-05-21 16:53:07',
            ),
            23 => 
            array (
                'id' => 35,
                'code' => 'nkstcmkar/2020/05370',
                'user_id' => 52,
                'profile_pix' => 'nkstcmkar202005370',
                'school_id' => 6,
                'created_at' => '2020-05-27 16:51:38',
                'updated_at' => '2020-05-27 16:51:38',
            ),
            24 => 
            array (
                'id' => 36,
                'code' => 'nkstcmkar/2020/01820',
                'user_id' => 53,
                'profile_pix' => 'nkstcmkar202001820',
                'school_id' => 6,
                'created_at' => '2020-05-27 16:56:07',
                'updated_at' => '2020-05-27 16:56:07',
            ),
            25 => 
            array (
                'id' => 37,
                'code' => 'iyogera/2020/68219',
                'user_id' => 54,
                'profile_pix' => 'iyogera202068219',
                'school_id' => 1,
                'created_at' => '2020-05-28 08:49:29',
                'updated_at' => '2020-05-28 08:49:29',
            ),
            26 => 
            array (
                'id' => 38,
                'code' => 'iyogera/2020/90409',
                'user_id' => 55,
                'profile_pix' => 'iyogera202090409',
                'school_id' => 1,
                'created_at' => '2020-05-28 08:51:33',
                'updated_at' => '2020-05-28 08:51:33',
            ),
            27 => 
            array (
                'id' => 39,
                'code' => 'iyogera/2020/57477',
                'user_id' => 56,
                'profile_pix' => 'iyogera202057477',
                'school_id' => 1,
                'created_at' => '2020-05-28 08:57:14',
                'updated_at' => '2020-05-28 08:57:14',
            ),
            28 => 
            array (
                'id' => 41,
                'code' => 'iyogera/2020/86431',
                'user_id' => 58,
                'profile_pix' => 'iyogera202086431',
                'school_id' => 1,
                'created_at' => '2020-05-28 09:31:38',
                'updated_at' => '2020-05-28 09:31:38',
            ),
            29 => 
            array (
                'id' => 42,
                'code' => 'iyogera/2020/98565',
                'user_id' => 59,
                'profile_pix' => 'iyogera202098565',
                'school_id' => 1,
                'created_at' => '2020-05-28 09:33:07',
                'updated_at' => '2020-05-28 09:33:07',
            ),
            30 => 
            array (
                'id' => 43,
                'code' => 'iyogera/2020/13450',
                'user_id' => 60,
                'profile_pix' => 'iyogera202013450',
                'school_id' => 1,
                'created_at' => '2020-05-28 09:33:24',
                'updated_at' => '2020-05-28 09:33:24',
            ),
        ));
        
        
    }
}