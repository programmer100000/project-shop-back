<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
          ['color_title' => 'مشکی'],
          ['color_title' => 'سفید'],
          ['color_title' => 'آبی'],
          ['color_title' => 'سبز'],
          ['color_title' => 'قرمز'],
          ['color_title' => 'زرد'],
          ['color_title' => 'صورتی'],
          ['color_title' => 'قهوه ای']
        ];
        DB::table('colors')->insert($colors);
        $roles = [
          ['role_title' => 'Admin'],
          ['role_title' => 'user']
        ];
        DB::table('roles')->insert($roles);
        $statuses = [
          ['status_title' => 'Active'],
          ['status_title' => 'isActive']
        ];
        DB::table('status')->insert($statuses);
        $user = [
          'username' => 'mehrabkb',
          'password' => Hash::make('1234'),
          'confirm_code' => '123456',
          'role_id' => 1 , 
          'status_id' => 1 
          
        ];
        DB::table('users')->insert($user);
        $offer_types =[
          ['offer_title' => 'off'],
          ['offer_title' => 'درصد'],
          ['offer_title' => 'قیمت']
        ];
        DB::table('offer_types')->insert($offer_types);
    }
}
