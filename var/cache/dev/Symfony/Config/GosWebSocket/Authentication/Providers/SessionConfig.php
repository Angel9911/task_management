<?php

namespace Symfony\Config\GosWebSocket\Authentication\Providers;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SessionConfig 
{
    private $sessionHandler;
    private $firewalls;
    private $_usedProperties = [];

    /**
     * The service ID of the session handler service used to read session data.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sessionHandler($value): static
    {
        $this->_usedProperties['sessionHandler'] = true;
        $this->sessionHandler = $value;

        return $this;
    }

    /**
     * The firewalls from which the session token can be used; can be an array, a string, or null to allow all firewalls.
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function firewalls(mixed $value = NULL): static
    {
        $this->_usedProperties['firewalls'] = true;
        $this->firewalls = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('session_handler', $value)) {
            $this->_usedProperties['sessionHandler'] = true;
            $this->sessionHandler = $value['session_handler'];
            unset($value['session_handler']);
        }

        if (array_key_exists('firewalls', $value)) {
            $this->_usedProperties['firewalls'] = true;
            $this->firewalls = $value['firewalls'];
            unset($value['firewalls']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['sessionHandler'])) {
            $output['session_handler'] = $this->sessionHandler;
        }
        if (isset($this->_usedProperties['firewalls'])) {
            $output['firewalls'] = $this->firewalls;
        }

        return $output;
    }

}
