<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maker = new Role();
        $maker->name = 'Maker';
        $maker->slug = 'maker';
        $maker->save();

        $shopper = new Role();
        $shopper->name = 'Shopper';
        $shopper->slug = 'shopper';
        $shopper->save();
    }
}
