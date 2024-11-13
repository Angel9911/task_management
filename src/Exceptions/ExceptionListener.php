<?php declare(strict_types=1);

namespace App\Exceptions;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        // Check if it's an instance of ObjectNotFoundException
        if ($exception instanceof ObjectNotFoundException) {
            $response = new JsonResponse([
                'error' => $exception->getObjectMessageData()
            ], $exception->getStatusCode());

            $event->setResponse($response);
            return;
        }

        // Handle other exceptions if needed
        if ($exception instanceof HttpExceptionInterface) {
            $response = new JsonResponse([
                'error' => $exception->getMessage(),
            ], $exception->getStatusCode());

            $event->setResponse($response);
        }
    }
}