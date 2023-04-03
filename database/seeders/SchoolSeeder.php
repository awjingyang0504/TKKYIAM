<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'school_categories' => 'Sekolah Menengah Kebangssan',
            'school_name' => 'Karak',
        ]);
        School::create([
            'school_categories' => 'Sekolah Menengah Kebangssan',
            'school_name' => 'Seri Bemban',
        ]);
       
        School::create([
            'school_categories' => 'Sekolah Menengah Kebangssan',
            'school_name' => 'Seri Kembangan',
        ]);
        School::create([
            'school_categories' => 'Sekolah Menengah Cina',
            'school_name' => 'Foon Yew',
        ]);
        School::create([
            'school_categories' => 'Sekolah Menengah Cina',
            'school_name' => 'Chong Hwa',
        ]);
        School::create([
            'school_categories' => 'Sekolah Menengah Cina',
            'school_name' => 'Confucian',
        ]);
    }
}
