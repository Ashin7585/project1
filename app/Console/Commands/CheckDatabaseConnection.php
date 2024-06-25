<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckDatabaseConnection extends Command
{
    protected $signature = 'db:check-connection';
    protected $description = 'Check if the database connection is established';

    public function handle()
    {
        try {
            DB::connection()->getPdo();
            $this->info('Database connection is established.');
        } catch (\Exception $e) {
            $this->error('Could not connect to the database. Please check your configuration.');
        }
    }
}
