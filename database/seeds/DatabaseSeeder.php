<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(CountriesSeeder::class);
        $this->command->info('Seeded the countries!');
        $this->call(RolesSeeder::class);
        $this->command->info('Seeded the roles!');
    }
}
