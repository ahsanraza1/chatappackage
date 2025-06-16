<?php

namespace Ahsanraza1\Builtinchat\Console;

class InstallBuiltInChat extends \Illuminate\Console\Command
{
    protected $signature = 'builtinchat:install {--fresh}';
    protected $description = 'Install BuiltInChat package (publish, migrate, seed)';

    public function handle()
    {
        $this->info('Publishing package migrations...');
        $this->call('vendor:publish', ['--tag' => 'builtinchat-migrations', '--force' => true]);
        
        // $this->info('Running package migrations...');
        $this->call(   'migrate'.(( $this->option('fresh'))?':fresh':''), [
                '--path' => 'database/migrations',
                '--force' => true,
            ]);
            
        $this->info('Publishing package seeders...');
        $this->call('vendor:publish', ['--tag' => 'builtinchat-seeders', '--force' => true]);
        $this->info('Seeding package database...');
        $this->call('db:seed', [
            '--class' => 'LanguageSeeder',
            '--force' => true,
        ]);
        $this->call('db:seed', [
            '--class' => 'UserSeeder',
            '--force' => true,
        ]);
        $this->info('Publishing package seeders...');
        $this->call('vendor:publish', ['--tag' => 'builtinchat-assets', '--force' => true]);

        $this->info('BuiltInChat package installed successfully!');
    }
}