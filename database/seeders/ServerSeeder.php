<?php

namespace Database\Seeders;

use App\Enums\ProxyStatus;
use App\Enums\ProxyTypes;
use App\Models\Server;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServerSeeder extends Seeder
{
    public function run(): void
    {
        Server::create([
            'name' => 'localhost',
            'description' => 'This is a test docker container in development mode',
            'ip' => 'coolify-testing-host',
            'team_id' => 1, // Refers to the "Root Team"
            'private_key_id' => 1, // Refers to the "Testing Host Key"
            'proxy' => [
                'type' => ProxyTypes::TRAEFIK->value,
                'status' => ProxyStatus::EXITED->value,
            ],
            'uuid' => Str::uuid(), // Dynamically generate a UUID
        ]);
    }
}
