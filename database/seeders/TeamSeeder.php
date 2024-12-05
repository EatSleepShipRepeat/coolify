<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        // Clear the teams and team_user pivot table before seeding
        \DB::table('team_user')->truncate();
        \DB::table('teams')->truncate();

        // Create the root team
        $rootTeam = Team::create([
            'name' => 'Root Team',
            'description' => 'The root team',
        ]);

        // Find users dynamically
        $normalUserInRootTeam = User::find(1);
        $normalUserNotInRootTeam = User::find(2);

        // Attach users to the root team
        if ($normalUserInRootTeam) {
            $normalUserInRootTeam->teams()->attach($rootTeam, ['role' => 'admin']);
        }

        if ($normalUserNotInRootTeam) {
            $normalUserNotInRootTeam->teams()->attach($rootTeam);
        }

        // Optionally, create other teams and link users
        $personalTeam = Team::create([
            'name' => 'Personal Team',
            'description' => 'A personal team for the user',
        ]);

        if ($normalUserInRootTeam) {
            $normalUserInRootTeam->teams()->attach($personalTeam);
        }
    }
}
