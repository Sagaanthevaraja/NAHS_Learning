<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class StartQuiz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start-quiz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the quiz application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentPath = getcwd();
        $filePath = 'E:\APIIT\others\CC2_assignment_1\NAHS_Learning\Quiz\online-quiz-system-php-laravel';

        try {
            \Log::info('Changing directory...');
            chdir($filePath);
            \Log::info('Directory Changed...');
            $process = new Process(['php', 'artisan', 'serve', '--port=8080']);

            // Set a longer timeout
            // $process->setTimeout(300); 

            // Log the start of the process
            \Log::info('Starting quiz application...');

            $process->start();

            // Wait for the process to finish
            $process->wait();

            if ($process->isSuccessful()) {
                \Log::info('Quiz application started successfully.');
            } else {
                \Log::error('Error starting quiz application: ' . $process->getExitCode());
            }

        } catch (\Exception $e) {
            \Log::error("Error starting quiz application: " . $e->getMessage());
        }
    }
}