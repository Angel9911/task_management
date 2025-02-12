<?php

namespace App\ScheduleJobs\DeleteFileJob;

use App\ScheduleJobs\Message;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class DeleteMessageHandlerJob
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(Message $message): void
    {
        $this->logger->info('Processing message: ' . get_class($message));

        // Your file deletion logic
        $logDir = dirname(__DIR__, 3) . '/var/log';


        if (!is_dir($logDir)) {
            $this->logger->error('The log directory is not correctly configured.');
            return;
        }

        $currentTime = time();
        $threshold = 5 * 24 * 60 * 60;; // older than 5 days in seconds

        $deletedFilesCount = 0;

        $files = scandir($logDir);

        foreach ($files as $file) {

            if ($file === '.' || $file === '..') continue;

            $filePath = $logDir . '/' . $file;

            if (is_file($filePath)) {

                $fileLastModifiedTime = filemtime($filePath);

                $olderFile = $currentTime - $fileLastModifiedTime;
                $this->logger->info(" old file: $olderFile");
                if ($olderFile > $threshold) {

                    if (unlink($filePath)) {

                        $this->logger->info("Deleted old file: $filePath");

                        $deletedFilesCount++;
                    } else {

                        $this->logger->error("Failed to delete: $filePath");
                    }
                }
            }
        }

        $this->logger->info("$deletedFilesCount old files deleted.");
    }
}