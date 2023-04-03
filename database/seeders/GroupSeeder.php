<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'groups_invention_name' => 'Nuclear Weapon',
            'school_id' => '1',
            'groups_age_categories' => 'from1-from3',
        ]);
        Group::create([
            'groups_invention_name' => 'Time Machine',
            'school_id' => '2',
            'groups_age_categories' => 'from1-from3',
        ]);
        Group::create([
            'groups_invention_name' => 'Clone Technology',
            'school_id' => '3',
            'groups_age_categories' => 'from1-from3',
        ]);
        Group::create([
            'groups_invention_name' => 'Bring Dying Back To Life',
            'school_id' => '4',
            'groups_age_categories' => 'from1-from3',
        ]);
        Group::create([
            'groups_invention_name' => 'Sun Creation',
            'school_id' => '5',
            'groups_age_categories' => 'from1-from3',
        ]);
        Group::create([
            'groups_invention_name' => 'Dimensionality Reduction Attack',
            'school_id' => '6',
            'groups_age_categories' => 'from4-from6',
        ]);
        Group::create([
            'groups_invention_name' => 'Teleportation',
            'school_id' => '1',
            'groups_age_categories' => 'from4-from6',
        ]);
        Group::create([
            'groups_invention_name' => 'Nano Suit',
            'school_id' => '2',
            'groups_age_categories' => 'from4-from6',
        ]);
        Group::create([
            'groups_invention_name' => 'Potential Diagnosis For Cancerous Cell Utilizing Optical Spectroscopy',
            'school_id' => '3',
            'groups_age_categories' => 'from4-from6',
        ]);
        Group::create([
            'groups_invention_name' => '3 in 1 Multi-Purpose Eco Washing Machine',
            'school_id' => '4',
            'groups_age_categories' => 'from4-from6',
        ]);
    }
}
