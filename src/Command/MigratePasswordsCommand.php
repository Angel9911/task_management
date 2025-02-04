<?php

namespace App\Command;

use App\ScheduleJobs\PasswordMigrationJob;
use App\utils\ObjectMapper;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:migrate-passwords',
    description: 'Add a short description for your command',
)]
class MigratePasswordsCommand extends Command
{
    protected static $defaultName = 'app:migrate-passwords';

    private LoggerInterface $logger;

    private $passwordMigrationJob;
    public function __construct(
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger
    )
    {
        $this->passwordMigrationJob = new PasswordMigrationJob($passwordHasher,$entityManager);
        $this->logger = $logger;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Starting password migration...</info>');

        try {
            $this->passwordMigrationJob->migratePassword();

            $this->logger->info('Successfully migration passwords: ',
            [
                'timestamp' => (new \DateTime())->format('Y-m-d H:i:s')
            ]);

            $output->writeln('<info>Passwords have been hashed successfully!</info>');
        } catch (\Exception $e) {

            $this->logger->info('Failed migration passwords: ',
                [
                    'exception' => $e->getMessage(),
                    'timestamp' => (new \DateTime())->format('Y-m-d H:i:s')
                ]);

            $output->writeln('<error>An error occurred: ' . $e->getMessage() . '</error>');
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
