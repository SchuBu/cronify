<?php

namespace Schubu\Cronify\Console\Commands;

use Illuminate\Console\Command;

class CronifyCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronify:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Cronify package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Publishing migration...');

        $this->call('vendor:publish', [
            '--provider' => "Schubu\Cronify\CronifyServiceProvider",
            '--tag' => "migrations"
        ]);

        $this->info('Published migration!');
    }
}
