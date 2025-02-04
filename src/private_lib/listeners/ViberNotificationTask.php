<?php

namespace App\private_lib\listeners;

use App\private_lib\events\TaskEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ViberNotificationTask implements NotificationListener
{
    private HttpClientInterface $httpClient;

    private LoggerInterface $logger;

    /**
     * @param HttpClientInterface $httpClient
     * @param LoggerInterface $logger
     */
    public function __construct(HttpClientInterface $httpClient, LoggerInterface $logger)
    {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
    }


    /**
     * @throws TransportExceptionInterface
     */
    #[AsEventListener(TaskEvent::NAME)]
    public function onTaskAssigned(TaskEvent $event): void
    {
        $task = $event->getTask();

        $user = $task->getAssignedUser();

        if (!$user->getPhone()) {
            $this->logger->warning("Viber number missing for user: " . $user->getName());
            return;
        }

        $viberApiUrl = "https://chatapi.viber.com/pa/send_message";

        $this->httpClient->request('POST', $viberApiUrl, [
            'json' => [
                "receiver" => $user->getPhoneNumber(),
                "type" => "text",
                "text" => "New Task Assigned: " . $task->getTitle(),
                "sender" => ["name" => "TaskManager"]
            ],
        ]);
    }
}