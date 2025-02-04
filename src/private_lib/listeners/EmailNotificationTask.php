<?php

namespace App\private_lib\listeners;

use App\private_lib\events\TaskEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailNotificationTask implements NotificationListener
{

    private LoggerInterface $logger;

    private MailerInterface $mailer;

    public function __construct(LoggerInterface $logger
                                ,MailerInterface $mailer)
    {
        $this->logger = $logger;

        $this->mailer = $mailer;
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[AsEventListener(TaskEvent::NAME)]
    public function onTaskAssigned(TaskEvent $event): void
    {

        $task = $event->getTask();

        $user = $task->getAssignedUser();

        if(!$user->getEmail()){
            $this->logger->warning("The email is empty for user: ".$user->getUsername());
            return;
        }

        $email = (new Email())
            ->from('no-reply@yourapp.com')
            ->to($user->getEmail())
            ->subject('Task assigned '. $task->getTitle())
            ->text('Task assigned');

        $this->mailer->send($email);
    }
}