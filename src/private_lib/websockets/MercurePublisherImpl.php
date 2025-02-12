<?php

namespace App\private_lib\websockets;

use App\utils\ObjectMapper;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

class MercurePublisherImpl implements MercurePublisher
{
    private HubInterface $hub;

    /**
     * @param HubInterface $hub
     */
    public function __construct(HubInterface $hub)
    {
        $this->hub = $hub;
    }


    function publish(string $message, string $type): void
    {
        $update = new Update(
            "https://127.0.0.1/errors/logs/$type",
            json_encode(ObjectMapper::mapObjectToJson(['type' => $type, 'message' => $message]))
        );

        $this->hub->publish($update);
    }
}