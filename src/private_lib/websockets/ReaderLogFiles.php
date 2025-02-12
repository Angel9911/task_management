<?php

namespace App\private_lib\websockets;

use Psr\Log\LoggerInterface;
use Symfony\Component\Finder\Finder;

class ReaderLogFiles
{
    private string $logDirectory;

    private LoggerInterface $logger;
    private MercurePublisher $mercurePublisher;

    private array $lastReadPositions = [];

    public function __construct(LoggerInterface $logger, MercurePublisher $mercurePublisher)
    {

        $this->logDirectory = dirname(__DIR__,3) . '/var/log';
        $this->logger = $logger;
        $this->mercurePublisher = $mercurePublisher;
    }


    public function trackLogs()
    {
        // TODO: could be improved by using schedule jobs
        while (true) {
            $this->checkLogFiles();

            sleep(3);
        }
    }

    private function checkLogFiles(): void
    {
        $finder = new Finder();

        $finder->files()->in($this->logDirectory)->name('dev*-2025-02-07.log');


        foreach ($finder as $file) {
            $filePath = $file->getRealPath();
            $currentFileSize = filesize($filePath);

            $lastReadSize = $this->lastReadPositions[$filePath] ?? 0;

            if($currentFileSize > $lastReadSize) {

                $newLogRows = $this->readNewLines($filePath,$lastReadSize);

                $this->lastReadPositions[$filePath] = $currentFileSize;

                if(!empty($newLogRows)) {

                    $this->publishLogs($newLogRows,$file->getFilename());
                }
            }
        }

    }

    private function publishLogs(array $logRows, string $fileName): void
    {
        $type = $this->checkFileType($fileName);

        foreach ($logRows as $logRow) {
            $this->mercurePublisher->publish($logRow, $type);
        }
    }

    private function readNewLines(string $filePath, int $lastReadPosition): array
    {
        $file = fopen($filePath, 'r');
        fseek($file, $lastReadPosition);

        $newLogs = [];
        while (($line = fgets($file)) !== false) {
            $newLogs[] = trim($line);
        }

        fclose($file);
        return $newLogs;
    }
    private function checkFileType(string $fileName): string
    {
        if(str_contains($fileName, 'error')){
            return 'error';
        }
        if(str_contains($fileName, 'warning')){
            return 'warning';
        }

        return 'info';
    }
}