<?php

namespace Symfony\Config\GosWebSocket\Client;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StorageConfig 
{
    private $driver;
    private $ttl;
    private $prefix;
    private $decorator;
    private $_usedProperties = [];

    /**
     * The service ID of the storage driver to use for storing connection data.
     * @default 'gos_web_socket.client.driver.in_memory'
     * @param ParamConfigurator|mixed $value
     * @deprecated The child node "driver" at path "storage" is deprecated and will be removed in GosWebSocketBundle 4.0. Use the "gos_web_socket.authentication.storage" node instead.
     * @return $this
     */
    public function driver($value): static
    {
        $this->_usedProperties['driver'] = true;
        $this->driver = $value;

        return $this;
    }

    /**
     * The cache TTL (in seconds) for clients in storage.
     * @default 900
     * @param ParamConfigurator|int $value
     * @deprecated The child node "ttl" at path "storage" is deprecated and will be removed in GosWebSocketBundle 4.0. Configure the TTL on the authentication storage driver instead.
     * @return $this
     */
    public function ttl($value): static
    {
        $this->_usedProperties['ttl'] = true;
        $this->ttl = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @deprecated The child node "prefix" at path "storage" is deprecated and will be removed in GosWebSocketBundle 4.0.
     * @return $this
     */
    public function prefix($value): static
    {
        $this->_usedProperties['prefix'] = true;
        $this->prefix = $value;

        return $this;
    }

    /**
     * The service ID of a decorator for the client storage driver.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @deprecated The child node "decorator" at path "storage" is deprecated and will be removed in GosWebSocketBundle 4.0. Use the "gos_web_socket.authentication.storage" node instead.
     * @return $this
     */
    public function decorator($value): static
    {
        $this->_usedProperties['decorator'] = true;
        $this->decorator = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('driver', $value)) {
            $this->_usedProperties['driver'] = true;
            $this->driver = $value['driver'];
            unset($value['driver']);
        }

        if (array_key_exists('ttl', $value)) {
            $this->_usedProperties['ttl'] = true;
            $this->ttl = $value['ttl'];
            unset($value['ttl']);
        }

        if (array_key_exists('prefix', $value)) {
            $this->_usedProperties['prefix'] = true;
            $this->prefix = $value['prefix'];
            unset($value['prefix']);
        }

        if (array_key_exists('decorator', $value)) {
            $this->_usedProperties['decorator'] = true;
            $this->decorator = $value['decorator'];
            unset($value['decorator']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['driver'])) {
            $output['driver'] = $this->driver;
        }
        if (isset($this->_usedProperties['ttl'])) {
            $output['ttl'] = $this->ttl;
        }
        if (isset($this->_usedProperties['prefix'])) {
            $output['prefix'] = $this->prefix;
        }
        if (isset($this->_usedProperties['decorator'])) {
            $output['decorator'] = $this->decorator;
        }

        return $output;
    }

}
