<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new Admin();
        $user1->email = "admin.smatanjungpriok@gmail.com";
        $user1->password = bcrypt("adminsmatjpriok");
        $user1->save();
    }
}
