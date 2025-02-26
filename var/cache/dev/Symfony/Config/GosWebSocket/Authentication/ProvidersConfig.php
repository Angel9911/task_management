<?php

namespace Symfony\Config\GosWebSocket\Authentication;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Providers'.\DIRECTORY_SEPARATOR.'SessionConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProvidersConfig 
{
    private $session;
    private $_usedProperties = [];

    public function session(array $value = []): \Symfony\Config\GosWebSocket\Authentication\Providers\SessionConfig
    {
        if (null === $this->session) {
            $this->_usedProperties['session'] = true;
            $this->session = new \Symfony\Config\GosWebSocket\Authentication\Providers\SessionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "session()" has already been initialized. You cannot pass values the second time you call session().');
        }

        return $this->session;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('session', $value)) {
            $this->_usedProperties['session'] = true;
            $this->session = new \Symfony\Config\GosWebSocket\Authentication\Providers\SessionConfig($value['session']);
            unset($value['session']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['session'])) {
            $output['session'] = $this->session->toArray();
        }

        return $output;
    }

}
