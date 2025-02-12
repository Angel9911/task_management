<?php

namespace App\private_lib\websockets;

interface MercurePublisher
{
    function publish(string $message, string $type): void;
}