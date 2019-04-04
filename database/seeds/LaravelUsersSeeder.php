<?php

use Illuminate\Database\Seeder;

class LaravelUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('laravel_users')->insert([ 'name' => str_random(10),  'email' => str_random(10).'@gmail.com', 'password' => bcrypt('secret'),]);
        \Illuminate\Support\Facades\DB::table('laravel_users_permissions')->insert([ 'user_id' => 1, 'limits' => 'platform.dashboard.orders.show|platform.dashboard.orders.export']);
        \Illuminate\Support\Facades\DB::table('laravel_roles')->insert(['name' => '测试人员', 'limits' => 'website.setting.adv.show']);
        \Illuminate\Support\Facades\DB::table('laravel_users_roles')->insert([ 'role_id' => 1, 'user_id' => 1]);
    }
}
