<?php

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:delete-old-files',
    description: 'Delete old log files'
)]
class RemovingOldLogFilesJob extends Command
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct();
    }

   protected function execute(InputInterface $input, OutputInterface $output): int
   {
       $output->writeln('<info>Starting deleting old log files...</info>');

       $logDir = dirname(__DIR__,2) . '/var/log';
       $output->writeln('<error> . '.$logDir.' . </error>');
       if(!is_dir($logDir)) {

           $output->writeln('<error>The log directory is not correctly </error>');
           return Command::FAILURE;
       }

       $currentTime = time();

       $threshold = 5 * 24 * 60 * 60; // older than 30 days in seconds

       try {

           $deletedFilesCount = 0;

           $files = scandir($logDir);

           foreach ($files as $file) {

               if ($file === '.' || $file === '..') {
                   continue;
               }

               $filePath = $logDir . '/' . $file;

               if(is_file($filePath)) {

                   $fileLastModifiedTime = filemtime($filePath);

                   $olderFile = $currentTime - $fileLastModifiedTime;

                   if($olderFile > $threshold) {

                       if(unlink($filePath)) {

                           $output->writeln('<info>The file '. $filePath . ' is deleted successfully' . '</info>');

                           $deletedFilesCount++;

                       }else{

                           $output->writeln('<error>Failed to delete: '. $filePath.'</error>');
                       }
                   }
               }
           }

           $output->writeln($deletedFilesCount . '<info> are deleted</info>');

           return Command::SUCCESS;

       }catch (\Exception $exception){

           $output->writeln('<error>An error occurred: '. $exception->getMessage().'</error>');

           return Command::FAILURE;
       }
   }

}