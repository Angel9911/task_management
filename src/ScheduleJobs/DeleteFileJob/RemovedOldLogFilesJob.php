<?php

namespace App\ScheduleJobs\DeleteFileJob;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:removed-old-files',
    description: 'Delete old log files'
)]
class RemovedOldLogFilesJob extends Command
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        parent::__construct();
        $this->bus = $bus;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->bus->dispatch(new DeleteMessageJob());
        $output->writeln('<info>Scheduled file deletion</info>');
        return Command::SUCCESS;
    }
}