<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = new User();
		$adminUser->user_type	= 'admin';
		$adminUser->name        = 'admin';
		$adminUser->email       = 'admin@mail.com';
		$adminUser->password    =  \Hash::make('12345678');
        $adminUser->address     = 'Xyz Place';
        $adminUser->save();
    }
}
