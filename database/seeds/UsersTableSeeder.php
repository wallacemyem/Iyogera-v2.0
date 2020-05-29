<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'De Mode',
                'email' => 'admin@iyogera.com',
                'password' => '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW',
                'profile_pix' => NULL,
                'role' => 'superadmin',
                'address' => '333 Fremont Street, CA',
                'phone' => '0202',
                'remember_token' => '4pPCuHzq8b41gwSr6RzTT0RV5TChTZRr5wtpCMIWX5tOjmPVmPUgDndVI8o3',
                'birthday' => NULL,
                'gender' => NULL,
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-03-14 02:01:54',
                'updated_at' => '2020-05-19 20:45:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Aboiyar Iorrumun',
                'email' => 'aboiyariorrumun2@gmail.com',
                'password' => '$2y$10$8qcISvHTRl3PeC8ILD6gVO1.HgBJINdCMVVKFovghLBArJAx2ACRO',
                'profile_pix' => NULL,
                'role' => 'teacher',
                'address' => 'DadaGonoyi, Crescent',
                'phone' => '07088550832',
                'remember_token' => 'f9HzMzsdOTX6YDaHC17TDU82bGAd0ChTCh3SoXqr7bXSTW0YN0PWTAQj6s4E',
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => 'a+',
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-01 22:53:17',
                'updated_at' => '2020-05-14 10:51:34',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Precious Audu',
                'email' => 'tor.phil@cdmportal.org',
                'password' => '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'DadaGonoyi Crescent',
                'phone' => '07088550832',
                'remember_token' => NULL,
                'birthday' => '1364943600',
                'gender' => 'others',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-01 22:57:45',
                'updated_at' => '2020-04-01 22:57:45',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Precious Audu',
                'email' => 'prudentgps@gmail.com',
                'password' => '$2y$10$yJNGK5TZK.UHqu.BjtqJoerTgWBJ83DCZglj/XsHF.7M1.qfRSjz2',
                'profile_pix' => NULL,
                'role' => 'teacher',
                'address' => 'DadaGonoyi Crescent',
                'phone' => '07088550832',
                'remember_token' => 'HhFyzqpWtKyBP9RZMI7iHwga4ThemmClz6jm9sFGGlKk5RdPrkaMfPkOgvBQ',
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => 'a+',
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-01 23:40:57',
                'updated_at' => '2020-04-01 23:40:57',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Wallace Myem',
                'email' => 'wallace@gmail.com',
                'password' => '$2y$10$otbLw2.iX8e4yBs.Fmsc6eLu8cNdD7sWf4tv8wDOD4vHTHMI/P4rW',
                'profile_pix' => NULL,
                'role' => 'superadmin',
                'address' => 'just here to school',
                'phone' => '08063955478',
                'remember_token' => 'apLaa7BMtZ4huAz4BG4a5qgte7G2UnFfJNvsPWOcRvPbiQjGzGRofddZ7c0I',
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-05-21 18:24:43',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Akor Jordan',
                'email' => 'audu@gmail.com',
                'password' => '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW',
                'profile_pix' => NULL,
                'role' => 'teacher',
                'address' => 'DadaGonoyi Crescent',
                'phone' => '07088550832',
                'remember_token' => 'FExiv11mNAHgnc25I7vRLx7vulnz38LSckCx69ykC1diUrLck9q3R4be65V9',
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => 'a+',
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-04-06 20:00:06',
                'updated_at' => '2020-04-06 20:00:06',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'Nice  Student',
                'email' => '08645@iyogera.com',
                'password' => '$2y$10$hX28kpRYDO7THLgu28Cl1uoRAtBMrzSVhTIz.iLp62gQZi4J/z1fC',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'School here, ok',
                'phone' => '02044787',
                'remember_token' => 'rPiuBTqFOxqP1qtHbt0RziTHuNGlr9Fw8XQwbCQMWws5PoRNpZAswVozMfzc',
                'birthday' => '1564614000',
                'gender' => 'others',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-04-07 10:26:22',
                'updated_at' => '2020-05-20 13:04:45',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'Ab Stu',
                'email' => '5@iyogera.com',
                'password' => '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => NULL,
                'phone' => '125',
                'remember_token' => NULL,
                'birthday' => '-3600',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-04-07 10:58:20',
                'updated_at' => '2020-04-20 04:36:16',
            ),
            8 => 
            array (
                'id' => 13,
                'name' => 'Stewie',
                'email' => '44032@iyogera.com',
                'password' => '$2y$10$SVxXtw8mCjQJi7uaBIK7cePMaGBfxitiMmd/jywcnjbkxXXY59.Xi',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => NULL,
                'phone' => '020447',
                'remember_token' => NULL,
                'birthday' => '-3600',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-04-07 11:01:18',
                'updated_at' => '2020-04-07 12:03:03',
            ),
            9 => 
            array (
                'id' => 14,
                'name' => 'Wallace Myem Aboiyar',
                'email' => '73968@iyogera.com',
                'password' => '$2y$10$uB17QLvgr4M8jnUu7eItS.p4gIbXPDA41jRFVJPJDvekt5QmS3u0q',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar
Mq',
                'phone' => '08067707813',
                'remember_token' => 'BBzFAzlc86qt4YdtqLQdZDLmSoh2OuuYNBiCnzP9CqJY70EkmgUf186Kbfeg',
                'birthday' => '1554159600',
                'gender' => 'female',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-04-07 12:09:11',
                'updated_at' => '2020-05-21 09:09:36',
            ),
            10 => 
            array (
                'id' => 15,
                'name' => 'Sabon Wayo',
                'email' => '39974@iyogera.com',
                'password' => '$2y$10$y6c.kVJeNWWjdwCNVG9wSuX1Ola/IXm4wq4Am94LJbDBNmMLC5Rvy',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'Kumpanni Guyuk',
                'phone' => '09067085656',
                'remember_token' => 'HUl5SKDj1VTWJuJnHirviITQvwZOjBzJq3MfA5YOmG4mWMZ5bGSTkd9F0BQW',
                'birthday' => '923439600',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-07 12:32:06',
                'updated_at' => '2020-05-02 12:45:52',
            ),
            11 => 
            array (
                'id' => 16,
                'name' => 'Adamu Musa',
                'email' => 'adamu@iyogera.com',
                'password' => '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW',
                'profile_pix' => NULL,
                'role' => 'teacher',
                'address' => 'Chikila Guyuk',
                'phone' => '09067085656',
                'remember_token' => 'OrynCv55M1D3nYjHJ8We9DTWUW526iaP6SQWbCxTxrpiaDfE3TRbLUvFXrWV',
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => 'ab+',
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-07 12:37:27',
                'updated_at' => '2020-04-07 12:37:27',
            ),
            12 => 
            array (
                'id' => 17,
                'name' => 'Azarah Mohammad',
                'email' => 'azarah@iyogera.com',
                'password' => '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW',
                'profile_pix' => NULL,
                'role' => 'supreme',
                'address' => 'Mkar, Gboko',
                'phone' => '08057607660',
                'remember_token' => 'sUcWT37Y4IuIK8b7GMwgnyPoF890pQk9GF836vlVnATNtXxL8dSrQGSPZs8l',
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => 'a+',
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-07 12:40:37',
                'updated_at' => '2020-05-14 10:25:10',
            ),
            13 => 
            array (
                'id' => 18,
                'name' => 'Azarah Kuduni',
                'email' => '75833@iyogera.com',
                'password' => '$2y$10$ZbHpNlh/tAWkHuIq8Xm17.bu/sLP75pTZmQ.svw3d1y0ZGhvapJnC',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'Mkar Gboko',
                'phone' => '08057607660',
                'remember_token' => NULL,
                'birthday' => '954889200',
                'gender' => 'female',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-07 12:46:14',
                'updated_at' => '2020-04-07 12:46:14',
            ),
            14 => 
            array (
                'id' => 19,
                'name' => 'Agbo Sonia',
                'email' => 'noah@gmail.com',
                'password' => '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW',
                'profile_pix' => NULL,
                'role' => 'librarian',
                'address' => 'mkar gboko',
                'phone' => '09067085656',
                'remember_token' => 'N14WmDizwUjP2c4RW6P10H1yz0Pae8gaUXJLDNzPQxcTV45cgAhFAtmyO6oK',
                'birthday' => NULL,
                'gender' => 'female',
                'blood_group' => 'a+',
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-04-08 16:39:34',
                'updated_at' => '2020-04-08 16:39:34',
            ),
            15 => 
            array (
                'id' => 20,
                'name' => 'De Mode Child',
                'email' => '95074@iyogera.com',
                'password' => '$2y$10$tT1t.e1qhgtF14bhtbY.9Oq7aD0hgl2/PoRojGMMdN/vQEwZaSJcu',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar
Mq 9',
                'phone' => '+2348067707813',
                'remember_token' => NULL,
                'birthday' => '1401836400',
                'gender' => 'female',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-04-28 06:53:04',
                'updated_at' => '2020-04-28 06:53:04',
            ),
            16 => 
            array (
                'id' => 21,
                'name' => 'De Mode other child',
                'email' => '38088@iyogera.com',
                'password' => '$2y$10$DVFi48774C08cb5QbdTx7.e1WBHAfTZ5bInQvn0Uv0YAYyCtT854O',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar
Mq 9',
                'phone' => '+2348067707813',
                'remember_token' => NULL,
                'birthday' => '1588028400',
                'gender' => 'others',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-04-28 07:11:13',
                'updated_at' => '2020-04-28 07:11:13',
            ),
            17 => 
            array (
                'id' => 23,
                'name' => 'De Mode',
                'email' => 'wallace2@gmail.com',
                'password' => '$2y$10$ox3h44AV5XDg9MeEjXLXWO7Lvzv3NM66571DD57nAXePzut6X1TWu',
                'profile_pix' => NULL,
                'role' => 'teacher',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar
Mq 9',
                'phone' => '+2348067707813',
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => 'a+',
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-04-29 22:20:24',
                'updated_at' => '2020-04-29 22:20:24',
            ),
            18 => 
            array (
                'id' => 24,
                'name' => 'Akase Aondohemba',
                'email' => '06814@iyogera.com',
                'password' => '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'here and there',
                'phone' => '090',
                'remember_token' => '8hUxWPiPU2ZbfH5exS4bDi67LO4dFmIbe7vtZ3WeobELhGwb9ph8b6aJgQjk',
                'birthday' => '-3600',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-05-01 20:48:22',
            ),
            19 => 
            array (
                'id' => 25,
                'name' => 'Calvin Sedoo',
                'email' => '61566@iyogera.com',
                'password' => '$2y$10$wveAwujhbF6yrpXf/cG.6.PM5fp6.QSaBpUXOdLEeUoFqMI/33h2O',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => NULL,
                'phone' => NULL,
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            20 => 
            array (
                'id' => 26,
                'name' => 'Tsegba Rita',
                'email' => '70906@iyogera.com',
                'password' => '$2y$10$3btptKG0lAb7.H7o2Vq/3OLPcH.M08w40maKb97syLKDxFzK..WWS',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => NULL,
                'phone' => NULL,
                'remember_token' => 'UIABcgqQ4w6LuoEN8vgKGBR1QgvM0PPHN6UZHeannA6KOtfaBSvfVSd0kQC8',
                'birthday' => NULL,
                'gender' => 'female',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            21 => 
            array (
                'id' => 27,
                'name' => 'Cherish Iyuadoo',
                'email' => '85503@iyogera.com',
                'password' => '$2y$10$AygfA69Bc396Cky4goB8dePSlXPWObrd1XQzSDyiBviVA7PKRBQtS',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => NULL,
                'phone' => NULL,
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'female',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-30 16:36:26',
                'updated_at' => '2020-04-30 16:36:26',
            ),
            22 => 
            array (
                'id' => 28,
                'name' => 'Aboiyar Noah',
                'email' => 'noah@iyogera.com',
                'password' => '$2y$10$XxWGnU/StyEaHPn.7R2bZOIkFKaBtMqHkOcCrbrwLwfqs99ZSXimi',
                'profile_pix' => NULL,
                'role' => 'accountant',
                'address' => 'Mkar, Gboko.',
                'phone' => '09067085656',
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => 'o+',
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-04-30 16:40:36',
                'updated_at' => '2020-04-30 16:40:36',
            ),
            23 => 
            array (
                'id' => 29,
                'name' => 'Mr. Nongu',
                'email' => 'nongu@yahoo.com',
                'password' => '$2y$10$XxWGnU/StyEaHPn.7R2bZOIkFKaBtMqHkOcCrbrwLwfqs99ZSXimi',
                'profile_pix' => NULL,
                'role' => 'superadmin',
                'address' => 'Mkar gboko',
                'phone' => '08024313852',
                'remember_token' => 'VTrLuOUAb8QvFPrbd62MA77BcTU86xvJsoamonYiizS9gggrhxx5P49c7ATI',
                'birthday' => NULL,
                'gender' => NULL,
                'blood_group' => NULL,
                'school_id' => 8,
                'authentication_key' => NULL,
                'created_at' => '2020-04-30 17:39:45',
                'updated_at' => '2020-04-30 17:39:45',
            ),
            24 => 
            array (
                'id' => 30,
                'name' => 'Wallace Myem Aboiyar',
                'email' => '97599@iyogera.com',
                'password' => '$2y$10$lTMiX33JU5rhy3.t5Sv/iuWWl1wt/9wG2XiD1WlmGzo7SKQoqnNra',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar
Mq 9',
                'phone' => '08067707813',
                'remember_token' => NULL,
                'birthday' => '1020207600',
                'gender' => 'others',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-01 20:28:16',
                'updated_at' => '2020-05-01 20:28:16',
            ),
            25 => 
            array (
                'id' => 31,
                'name' => 'Ternam Wallace',
                'email' => '80046@iyogera.com',
                'password' => '$2y$10$cPYDpMDPYzEbwzcCq/EFqug0ju2TK8Trrvxe9KQhStAimcyARSNpG',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar
Mq 9',
                'phone' => '08067707813',
                'remember_token' => NULL,
                'birthday' => '1586386800',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-14 12:04:49',
                'updated_at' => '2020-05-14 12:04:49',
            ),
            26 => 
            array (
                'id' => 32,
                'name' => 'Orduen Ortyo',
                'email' => '91487@iyogera.com',
                'password' => '$2y$10$.LzeCwNKNr74K9JElvbb2.ayX/ELPNRZp3mJkuOgFDrqg5G8Tz032',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'same as schoool',
                'phone' => '08065448266',
                'remember_token' => NULL,
                'birthday' => '1589670000',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 8,
                'authentication_key' => NULL,
                'created_at' => '2020-05-17 09:00:26',
                'updated_at' => '2020-05-17 09:00:26',
            ),
            27 => 
            array (
                'id' => 33,
                'name' => 'Ternam',
                'email' => '81967@iyogera.com',
                'password' => '$2y$10$KKrTYGBF52jzwPyjbzCJjO/dz5H4F3gpDavy9FMnAgsP52DSc3YqG',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar',
                'phone' => '08067707813',
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-19 23:13:11',
                'updated_at' => '2020-05-19 23:13:11',
            ),
            28 => 
            array (
                'id' => 34,
                'name' => 'Myem',
                'email' => '39673@iyogera.com',
                'password' => '$2y$10$RRhCN0othyIH155cGnvmh.i5bwtOTdrx.m/sac1D.9COovtwm50Nq',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar',
                'phone' => '08067707813',
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'others',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-19 23:13:11',
                'updated_at' => '2020-05-19 23:13:11',
            ),
            29 => 
            array (
                'id' => 38,
                'name' => 'flight mode',
                'email' => '22221@iyogera.com',
                'password' => '$2y$10$Hy.EhvsCJOeeQbSgcv8e7en0NKQjwV4eBICswNdC0cKbkJkZtnOv.',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'No 9 opposite doctors quarters\' Mkar',
                'phone' => '08067707813',
                'remember_token' => NULL,
                'birthday' => '1497308400',
                'gender' => 'others',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-05-21 09:15:48',
                'updated_at' => '2020-05-21 09:15:48',
            ),
            30 => 
            array (
                'id' => 43,
                'name' => 'Agwaza Sonnen',
                'email' => '58436@iyogera.com',
                'password' => '$2y$10$ZOUqRTIjrx79zNuacFT0PuXq/Wdz6k9i2jErQrXHV2Rulf0qhOj96',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'Gboko',
                'phone' => '09077778888',
                'remember_token' => NULL,
                'birthday' => '957222000',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-21 09:48:01',
                'updated_at' => '2020-05-21 09:48:01',
            ),
            31 => 
            array (
                'id' => 46,
                'name' => 'Wallace Aboiyar',
                'email' => 'wallacemyem@hotmail.com',
                'password' => '$2y$10$Y39rQ2vAwtL/RQuxuEbo1usnWe4uDfuE79ui33STc.A3Icy63jzTe',
                'profile_pix' => NULL,
                'role' => 'librarian',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar
Mq 9',
                'phone' => '+2348067707813',
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'female',
                'blood_group' => 'a+',
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-05-21 12:54:34',
                'updated_at' => '2020-05-21 12:54:34',
            ),
            32 => 
            array (
                'id' => 47,
                'name' => 'marketer here',
                'email' => '23968@iyogera.com',
                'password' => '$2y$10$YxiwnDHs8t.CLbcmj04QcuXayqfIKSURWRnR1ZfRyY6eVrYUQj3sK',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'DadaGonoyi Crescent',
                'phone' => '08068256917',
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-05-21 16:53:07',
                'updated_at' => '2020-05-21 16:53:07',
            ),
            33 => 
            array (
                'id' => 48,
                'name' => 'De Mode',
                'email' => '60329@iyogera.com',
                'password' => '$2y$10$DZV/1HFNWBkr/.icO07m7OFCXiglsbHaECmIXCpGJQPVHqDFuGMRW',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'DadaGonoyi Crescent',
                'phone' => '08068256917',
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-05-21 16:53:07',
                'updated_at' => '2020-05-21 16:53:07',
            ),
            34 => 
            array (
                'id' => 49,
                'name' => 'Precious Audu',
                'email' => '88354@iyogera.com',
                'password' => '$2y$10$FidbaQWtsU8DcOn9RLsag.kU.CL.ZhoOZU0T35u44dEWCfP5k7VOi',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => 'DadaGonoyi Crescent',
                'phone' => '08068256917',
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'female',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-05-21 16:53:07',
                'updated_at' => '2020-05-21 16:53:07',
            ),
            35 => 
            array (
                'id' => 51,
                'name' => 'Az',
                'email' => 'az@iyogera.com',
                'password' => '$2y$10$K3NymfdZTnw4H1OypvVYHOFD77Dn262g4RYGY0Mw/4Q43jQ82SikW',
                'profile_pix' => NULL,
                'role' => 'superadmin',
                'address' => 'That home at Maitama',
                'phone' => '09056987125',
                'remember_token' => NULL,
                'birthday' => NULL,
                'gender' => 'other',
                'blood_group' => NULL,
                'school_id' => 13,
                'authentication_key' => NULL,
                'created_at' => '2020-05-25 11:41:14',
                'updated_at' => '2020-05-25 11:41:14',
            ),
            36 => 
            array (
                'id' => 52,
                'name' => 'Soonenter Aboiyar',
                'email' => '05370@iyogera.com',
                'password' => '$2y$10$9rFb84EakbqDZGyw3w9iyOOD0OZpsPl7YvGkmceKT5H9TzjjyL2u2',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9
Mq 9',
                'phone' => NULL,
                'remember_token' => NULL,
                'birthday' => '1590534000',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-05-27 16:51:37',
                'updated_at' => '2020-05-27 16:51:37',
            ),
            37 => 
            array (
                'id' => 53,
                'name' => 'Soonenter Aboiyar',
                'email' => '01820@iyogera.com',
                'password' => '$2y$10$4x45.W9/tq58e6PRqnwp4usF.uu.IvZlgFVCJpXGzTx9MaJ4WBcI2',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9
Mq 9',
                'phone' => NULL,
                'remember_token' => NULL,
                'birthday' => '1590534000',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 6,
                'authentication_key' => NULL,
                'created_at' => '2020-05-27 16:56:06',
                'updated_at' => '2020-05-27 16:56:06',
            ),
            38 => 
            array (
                'id' => 54,
                'name' => 'Soonenter Aboiyar',
                'email' => '68219@iyogera.com',
                'password' => '$2y$10$/TsVGii2/5oIKsu05Rh0pOF0O7Zm29UVh/ztOCD31PYkMt2Za4I6O',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9
Mq 9',
                'phone' => '07088550832',
                'remember_token' => NULL,
                'birthday' => '1590620400',
                'gender' => 'female',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-28 08:49:29',
                'updated_at' => '2020-05-28 08:49:29',
            ),
            39 => 
            array (
                'id' => 55,
                'name' => 'Soonenter Aboiyar',
                'email' => '90409@iyogera.com',
                'password' => '$2y$10$LS0hH8kXOw/go68bH9wH6ukmfutAoE8DyhH9gkBXQvmzGzJEHhaqi',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9
Mq 9',
                'phone' => '07088550832',
                'remember_token' => NULL,
                'birthday' => '1590620400',
                'gender' => 'female',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-28 08:51:33',
                'updated_at' => '2020-05-28 08:51:33',
            ),
            40 => 
            array (
                'id' => 56,
                'name' => 'Soonenter Aboiyar',
                'email' => '57477@iyogera.com',
                'password' => '$2y$10$zC8b9zzRmi8qoQLMbbf/EuXaIgUuX7bn1us7x9O9RnzCwm9UtuMwi',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9
Mq 9',
                'phone' => '07088550832',
                'remember_token' => NULL,
                'birthday' => '1590620400',
                'gender' => 'female',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-28 08:57:14',
                'updated_at' => '2020-05-28 08:57:14',
            ),
            41 => 
            array (
                'id' => 58,
                'name' => 'Soonenter Aboiyar',
                'email' => '86431@iyogera.com',
                'password' => '$2y$10$o/1RdSNIDQb3aL5xIySJ4e6e0YjarW5SMBJ2FoxLrzkN87wf45H7i',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9
Mq 9',
                'phone' => '+2348067707813',
                'remember_token' => NULL,
                'birthday' => '1590620400',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-28 09:31:38',
                'updated_at' => '2020-05-28 09:31:38',
            ),
            42 => 
            array (
                'id' => 59,
                'name' => 'Soonenter Aboiyar',
                'email' => '98565@iyogera.com',
                'password' => '$2y$10$wgoPJW1N3/CME9n9WSGnHOPQf8wzWs2Qja9QmuuBji2vsH2tyTCru',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9
Mq 9',
                'phone' => '+2348067707813',
                'remember_token' => NULL,
                'birthday' => '1590620400',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-28 09:33:07',
                'updated_at' => '2020-05-28 09:33:07',
            ),
            43 => 
            array (
                'id' => 60,
                'name' => 'Soonenter Aboiyar',
                'email' => '13450@iyogera.com',
                'password' => '$2y$10$x39oU0O7ULZBEvB3uYAI6e7ZoYye0hCmGeMotrtCKWh.wkMZCUyWu',
                'profile_pix' => NULL,
                'role' => 'student',
                'address' => '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9
Mq 9',
                'phone' => '+2348067707813',
                'remember_token' => NULL,
                'birthday' => '1590620400',
                'gender' => 'male',
                'blood_group' => NULL,
                'school_id' => 1,
                'authentication_key' => NULL,
                'created_at' => '2020-05-28 09:33:24',
                'updated_at' => '2020-05-28 09:33:24',
            ),
        ));
        
        
    }
}