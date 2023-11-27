<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateDbCredentials extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-db-credentials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enter your database credentials';

    /**
     * Constructor.     
     */
    public function __construct()
    {
        parent::__construct();        
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $localhost = $this->ask('Enter your localhost to be set?');
        //dd($localhost);
        return $localhost;
    }
}
