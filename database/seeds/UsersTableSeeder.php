<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        DB::table('role_user')->truncate();

        // SuperAdmin
        $superAdminRole = Role::where('name', 'superadmin')->first();
        $superAdmin = User::create([
            'name' => 'Lincoln Nail',
            'email' => 'lnail@ldc.app',
            'password' => Hash::make('0524$ean')
        ]);
        $superAdmin->roles()->attach($superAdminRole);

        // Site Admin
        $siteAdminRole = Role::where('name', 'admin')->first();
        $siteAdmin = User::create([
            'name' => 'Site Admin',
            'email' => 'admin@ldc.app',
            'password' => Hash::make('0524$ean')
        ]);
        $siteAdmin->roles()->attach($siteAdminRole);

        // Business Manager
        $businessManagerRole = Role::where('name', 'business-manager')->first();
        $businessManager = User::create([
            'name' => 'Business Manager',
            'email' => 'business_mgr@ldc.app',
            'password' => Hash::make('0524$ean')
        ]);
        $businessManager->roles()->attach($businessManagerRole);

        // Business User
        $businessUserRole = Role::where('name', 'business-user')->first();
        $businessUser = User::create([
            'name' => 'Business User',
            'email' => 'business_user@ldc.app',
            'password' => Hash::make('0524$ean')
        ]);
        $businessUser->roles()->attach($businessUserRole);

        // Discount User
        $discountUserRole = Role::where('name', 'discount-user')->first();
        $discountUser = User::create([
            'name' => 'Discount User',
            'email' => 'user@ldc.app',
            'password' => Hash::make('0524$ean')
        ]);
        $discountUser->roles()->attach($discountUserRole);
    }
}
