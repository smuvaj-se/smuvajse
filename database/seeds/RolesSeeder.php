<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = Carbon\Carbon::now();

        //Empty the roles table
        DB::table('roles')->delete();

        DB::table('roles')->insert([

        	['name' => 'admin', 'created_at' => $date],
        	['name' => 'moderator', 'created_at' => $date],
        	['name' => 'user', 'created_at' => $date],

        ]);
    }
}
