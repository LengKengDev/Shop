<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(["name" => "manager"]);
        $role = Role::create(["name" => "administrator"]);
        $role->givePermissionTo("manager");
        $role = Role::create(["name" => "customer"]);
        $admin = User::create([
            "name" => "Administrator",
            "email" => "admin@shop.com",
            "password" => bcrypt("123456"),
            "active" =>true
        ]);
        $admin->assignRole("administrator");

        User::create([
            "name" => "User 1",
            "email" => "user@shop.com",
            "password" => bcrypt("123456"),
            "active" =>true
        ]);

        $this->call(SampleDataSeeder::class);
    }
}
