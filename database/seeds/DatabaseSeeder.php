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
          'password' => Hash::make('1234')
          
        ];
        DB::table('users')->insert($user);
    }
}
