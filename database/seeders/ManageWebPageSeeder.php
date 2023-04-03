<?php

namespace Database\Seeders;

use App\Models\Webpage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManageWebPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Webpage::create([
            'webpages_name' => 'Register Competition',
            'isActive' => '1',
        ]);
        Webpage::create([
            'webpages_name' => 'Manage Participant Status',
            'isActive' => '0',
        ]);
        Webpage::create([
            'webpages_name' => 'Manage Result',
            'isActive' => '0',
        ]);
    }
}
