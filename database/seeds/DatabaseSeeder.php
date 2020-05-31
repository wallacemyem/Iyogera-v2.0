<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(SessionsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(EnrollsTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
    }
}
