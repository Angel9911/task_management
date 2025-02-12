<?php

namespace App\Command;

use App\private_lib\websockets\ReaderLogFiles;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:monitor-logs',
    description: 'Monitor logs',
)]
class MonitorLogsCommand extends Command
{
    private ReaderLogFiles $logReader;

    public function __construct(ReaderLogFiles $logReader)
    {
        parent::__construct();
        $this->logReader = $logReader;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Monitoring log files...');
        $this->logReader->trackLogs();
        return Command::SUCCESS;
    }
}