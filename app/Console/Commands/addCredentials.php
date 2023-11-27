<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class addCredentials extends Command
{
    protected string $path;

    protected string $filePath;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-credentials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enter your credentials';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbHost = $this->ask('Enter your localhost to be set?');
        $dbPort = $this->ask('Enter your database port to be set? (ex: 3306)');
        $db = $this->ask('Enter your database name to be set?');
        $dbUsername = $this->ask('Enter your database username to be set?');
        $dbPwd = $this->ask('Enter your database password to be set?');

        //dd($dbUsername);
        //putenv('DB_HOST='.$localhost);
        //$_ENV['DB_HOST'] = 'local';
        
        $this->path = base_path('.env');
        $this->filePath = file_get_contents($this->path);

        if (file_exists($this->path)) {
            $databaseHost = $_ENV['DB_HOST'];
            $databasePort = $_ENV['DB_PORT'];
            $database = $_ENV['DB_DATABASE'];
            $databaseUsername = $_ENV['DB_USERNAME'];
            $databasePassword = $_ENV['DB_PASSWORD'];
            //dd($databaseHost);
            file_put_contents($this->path, str_replace('DB_HOST='.$databaseHost, 'DB_HOST='.$dbHost, $this->filePath));
            file_put_contents($this->path, str_replace('DB_PORT='.$databasePort, 'DB_PORT='.$dbPort, $this->filePath));
            file_put_contents($this->path, str_replace('DB_DATABASE='.$database, 'DB_DATABASE='.$db, $this->filePath));
            file_put_contents($this->path, str_replace('DB_USERNAME='.$databaseUsername, 'DB_USERNAME='.$dbUsername, $this->filePath));
            file_put_contents($this->path, str_replace('DB_PASSWORD='.$databasePassword, 'DB_PASSWORD='.$dbPwd, $this->filePath));
        }
    }
}
