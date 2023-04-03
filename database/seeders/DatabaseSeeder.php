<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(GroupMembersSeeder::class);
        $this->call(ParticipantSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(ResultSeeder::class);
        $this->call(ManageWebPageSeeder::class);
    }
}
