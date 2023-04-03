<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Info;

class Notification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::create([
            'title' => 'Open registration',
            'note' => 'Competition Registration is now available until mid night of 2022-04-18. The organizer welcomes from 1 to from 6 students from SMK of SMC to participate this competition.',
            'date' => '2022-02-14',
        ]);
    }
}
