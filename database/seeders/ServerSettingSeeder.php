<?php

namespace Database\Seeders;

use App\Models\Server;
use App\Models\ServerSetting;  // Changed from ServerSettings to ServerSetting
use Illuminate\Database\Seeder;

class ServerSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first server
        $server = Server::first();
        
        if (!$server) {
            echo "No servers found. Please ensure servers are seeded first.\n";
            return;
        }

        // Create or update settings for this server
        $settings = ServerSetting::firstOrNew(['server_id' => $server->id]);  // Changed from ServerSettings to ServerSetting
        
        // Set the required settings
        $settings->wildcard_domain = 'http://127.0.0.1.sslip.io';
        $settings->is_build_server = false;
        $settings->is_usable = true;
        $settings->is_reachable = true;
        
        // Set other default values
        $settings->is_swarm_manager = false;
        $settings->is_jump_server = false;
        $settings->concurrent_builds = 2;
        $settings->dynamic_timeout = 3600;
        $settings->docker_cleanup_frequency = '0 0 * * *';
        $settings->docker_cleanup_threshold = 80;
        $settings->server_timezone = 'UTC';
        
        $settings->save();
    }
}
