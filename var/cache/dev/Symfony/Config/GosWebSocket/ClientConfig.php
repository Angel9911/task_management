<?php

namespace Symfony\Config\GosWebSocket;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Client'.\DIRECTORY_SEPARATOR.'StorageConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ClientConfig 
{
    private $sessionHandler;
    private $firewall;
    private $storage;
    private $_usedProperties = [];

    /**
     * The service ID of the session handler service used to read session data.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @deprecated The child node "session_handler" at path "client" is deprecated and will be removed in GosWebSocketBundle 4.0. Set the session handler on the session authentication provider instead.
     * @return $this
     */
    public function sessionHandler($value): static
    {
        $this->_usedProperties['sessionHandler'] = true;
        $this->sessionHandler = $value;

        return $this;
    }

    /**
     * The name of the security firewall to load the authenticated user data for.
     * @default 'ws_firewall'
     * @param ParamConfigurator|mixed $value
     * @deprecated The child node "firewall" at path "client" is deprecated and will be removed in GosWebSocketBundle 4.0. Set the firewalls on the session authentication provider instead.
     *
     * @return $this
     */
    public function firewall(mixed $value = 'ws_firewall'): static
    {
        $this->_usedProperties['firewall'] = true;
        $this->firewall = $value;

        return $this;
    }

    /**
     * @default {"driver":"gos_web_socket.client.driver.in_memory","ttl":900,"prefix":""}
     * @deprecated The child node "storage" at path "client" is deprecated and will be removed in GosWebSocketBundle 4.0. Use the "gos_web_socket.authentication.storage" node instead.
    */
    public function storage(array $value = []): \Symfony\Config\GosWebSocket\Client\StorageConfig
    {
        if (null === $this->storage) {
            $this->_usedProperties['storage'] = true;
            $this->storage = new \Symfony\Config\GosWebSocket\Client\StorageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "storage()" has already been initialized. You cannot pass values the second time you call storage().');
        }

        return $this->storage;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('session_handler', $value)) {
            $this->_usedProperties['sessionHandler'] = true;
            $this->sessionHandler = $value['session_handler'];
            unset($value['session_handler']);
        }

        if (array_key_exists('firewall', $value)) {
            $this->_usedProperties['firewall'] = true;
            $this->firewall = $value['firewall'];
            unset($value['firewall']);
        }

        if (array_key_exists('storage', $value)) {
            $this->_usedProperties['storage'] = true;
            $this->storage = new \Symfony\Config\GosWebSocket\Client\StorageConfig($value['storage']);
            unset($value['storage']);
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
        if (isset($this->_usedProperties['firewall'])) {
            $output['firewall'] = $this->firewall;
        }
        if (isset($this->_usedProperties['storage'])) {
            $output['storage'] = $this->storage->toArray();
        }

        return $output;
    }

}
