<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shopper = Role::where('slug','shopper')->first();
        $maker = Role::where('slug', 'maker')->first();
        $createTasks = Permission::where('slug','create-tasks')->first();
        $manageProd = Permission::where('slug','manage-products')->first();

        $user1 = new User();
        $user1->name = 'Производитель';
        $user1->email = 'user1@user.com';
        $user1->password = bcrypt('12345678');
        $user1->save();
        $user1->roles()->attach($maker);
        $user1->permissions()->attach($manageProd);

        $user1 = new User();
        $user1->name = 'Производитель2';
        $user1->email = 'user2@user.com';
        $user1->password = bcrypt('12345678');
        $user1->save();
        $user1->roles()->attach($maker);
        $user1->permissions()->attach($manageProd);

        $user2 = new User();
        $user2->name = 'Покупатель';
        $user2->email = 'user3@user.com';
        $user2->password = bcrypt('12345678');
        $user2->save();
        $user2->roles()->attach($shopper);
        $user2->permissions()->attach($createTasks);

        $user3 = new User();
        $user3->name = 'Покупатель2';
        $user3->email = 'user4@user.com';
        $user3->password = bcrypt('12345678');
        $user3->save();
        $user3->roles()->attach($shopper);
        $user3->permissions()->attach($createTasks);
    }
}
