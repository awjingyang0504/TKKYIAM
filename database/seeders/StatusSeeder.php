<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['statuses_name' => 'disqualified']);
        Status::create(['statuses_name' => 'registered']);
        Status::create(['statuses_name' => 'warning']);
        Status::create(['statuses_name' => 'reviewing']);
        Status::create(['statuses_name' => 'shortlisted']);
        Status::create(['statuses_name' => 'finalist']);
        Status::create(['statuses_name' => 'bronze']);
        Status::create(['statuses_name' => 'silver']);
        Status::create(['statuses_name' => 'gold']);
        Status::create(['statuses_name' => 'unfortune']);
    }
}
