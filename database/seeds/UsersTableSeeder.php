<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $adminRole = Role::where('name','admin')->first();
        $companyRole = Role::where('name','company')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'rolename' => 'Admin',
            'fullname'=>'Ahmad',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $company = User::create([
            'rolename'=>'Company',
            'fullname'=>'RRK',
            'email'=>'company@gmail.com',
            'password'=>bcrypt('iamcompany')
        ]);

        $user = User::create([
            'rolename'=>'User',
            'fullname'=>'Rakib',
            'email'=>'user1@gmail.com',
            'password'=>bcrypt('iamuser11')
        ]);
        $user2 = User::create([
            'rolename'=>'User',
            'fullname'=>'Niceee',
            'email'=>'user2@gmail.com',
            'password'=>bcrypt('coolrajib')
        ]);
        $admin->roles()->attach($adminRole);
        $company->roles()->attach($companyRole);
        $user->roles()->attach($userRole);
        $user2->roles()->attach($userRole);
    }
}
