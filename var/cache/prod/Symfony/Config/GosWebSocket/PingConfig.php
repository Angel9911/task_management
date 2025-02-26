<?php

namespace Symfony\Config\GosWebSocket;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Ping'.\DIRECTORY_SEPARATOR.'ServicesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PingConfig 
{
    private $services;
    private $_usedProperties = [];

    public function services(array $value = []): \Symfony\Config\GosWebSocket\Ping\ServicesConfig
    {
        $this->_usedProperties['services'] = true;

        return $this->services[] = new \Symfony\Config\GosWebSocket\Ping\ServicesConfig($value);
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('services', $value)) {
            $this->_usedProperties['services'] = true;
            $this->services = array_map(fn ($v) => new \Symfony\Config\GosWebSocket\Ping\ServicesConfig($v), $value['services']);
            unset($value['services']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['services'])) {
            $output['services'] = array_map(fn ($v) => $v->toArray(), $this->services);
        }

        return $output;
    }

}
