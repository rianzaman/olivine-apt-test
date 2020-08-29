<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			[
                'name'=> 'The Boss',
                'type'=> 'Super Admin',
                'email'=> 'admin@todo.demo',
                'image'=> 'default_resource/images/super_admin/default_super_admin_king.svg',
                'gender'=> 'male',
                'password'=> bcrypt("admin@todo"),
                'status'=> 'active',
                'email_verified_at'=> Carbon::now(),
            ],
     
        ]);
    }
}
