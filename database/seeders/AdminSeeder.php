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
        $user1->email = "Smatanjungpriok2@gmail.com";
        $user1->password = bcrypt("PATSMA2020");
        $user1->save();
    }
}
