<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Participant;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Participant::create([
            'user_id' => '2',
            'group_id' => '1',
            'status_id' => '4',
            'participant_name' => 'pariticipant1',
        ]);
        Participant::create([
            'user_id' => '3',
            'group_id' => '2',
            'status_id' => '4',
            'participant_name' => 'participant2',
        ]);
        Participant::create([
            'user_id' => '4',
            'group_id' => '3',
            'status_id' => '4',
            'participant_name' => 'participant3',
        ]);
        Participant::create([
            'user_id' => '5',
            'group_id' => '4',
            'status_id' => '4',
            'participant_name' => 'participant4',
        ]);
        Participant::create([
            'user_id' => '6',
            'group_id' => '5',
            'status_id' => '4',
            'participant_name' => 'participant5',
        ]);
        Participant::create([
            'user_id' => '7',
            'group_id' => '6',
            'status_id' => '4',
            'participant_name' => 'participant6',
        ]);
        Participant::create([
            'user_id' => '8',
            'group_id' => '7',
            'status_id' => '4',
            'participant_name' => 'participant7',
        ]);
        Participant::create([
            'user_id' => '9',
            'group_id' => '8',
            'status_id' => '4',
            'participant_name' => 'participant8',
        ]);
        Participant::create([
            'user_id' => '10',
            'group_id' => '9',
            'status_id' => '4',
            'participant_name' => 'participant9',
        ]);
        Participant::create([
            'user_id' => '11',
            'group_id' => '10',
            'status_id' => '4',
            'participant_name' => 'participant10',
        ]);
    }
}
