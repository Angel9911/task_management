<?php

namespace Symfony\Config\GosWebSocket\Pushers;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AmqpConfig 
{
    private $enabled;
    private $host;
    private $port;
    private $login;
    private $password;
    private $vhost;
    private $readTimeout;
    private $writeTimeout;
    private $connectTimeout;
    private $queueName;
    private $exchangeName;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function host($value): static
    {
        $this->_usedProperties['host'] = true;
        $this->host = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function port($value): static
    {
        $this->_usedProperties['port'] = true;
        $this->port = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function login($value): static
    {
        $this->_usedProperties['login'] = true;
        $this->login = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function password($value): static
    {
        $this->_usedProperties['password'] = true;
        $this->password = $value;

        return $this;
    }

    /**
     * @default '/'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function vhost($value): static
    {
        $this->_usedProperties['vhost'] = true;
        $this->vhost = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function readTimeout($value): static
    {
        $this->_usedProperties['readTimeout'] = true;
        $this->readTimeout = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function writeTimeout($value): static
    {
        $this->_usedProperties['writeTimeout'] = true;
        $this->writeTimeout = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function connectTimeout($value): static
    {
        $this->_usedProperties['connectTimeout'] = true;
        $this->connectTimeout = $value;

        return $this;
    }

    /**
     * @default 'gos_websocket'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function queueName($value): static
    {
        $this->_usedProperties['queueName'] = true;
        $this->queueName = $value;

        return $this;
    }

    /**
     * @default 'gos_websocket_exchange'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function exchangeName($value): static
    {
        $this->_usedProperties['exchangeName'] = true;
        $this->exchangeName = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('host', $value)) {
            $this->_usedProperties['host'] = true;
            $this->host = $value['host'];
            unset($value['host']);
        }

        if (array_key_exists('port', $value)) {
            $this->_usedProperties['port'] = true;
            $this->port = $value['port'];
            unset($value['port']);
        }

        if (array_key_exists('login', $value)) {
            $this->_usedProperties['login'] = true;
            $this->login = $value['login'];
            unset($value['login']);
        }

        if (array_key_exists('password', $value)) {
            $this->_usedProperties['password'] = true;
            $this->password = $value['password'];
            unset($value['password']);
        }

        if (array_key_exists('vhost', $value)) {
            $this->_usedProperties['vhost'] = true;
            $this->vhost = $value['vhost'];
            unset($value['vhost']);
        }

        if (array_key_exists('read_timeout', $value)) {
            $this->_usedProperties['readTimeout'] = true;
            $this->readTimeout = $value['read_timeout'];
            unset($value['read_timeout']);
        }

        if (array_key_exists('write_timeout', $value)) {
            $this->_usedProperties['writeTimeout'] = true;
            $this->writeTimeout = $value['write_timeout'];
            unset($value['write_timeout']);
        }

        if (array_key_exists('connect_timeout', $value)) {
            $this->_usedProperties['connectTimeout'] = true;
            $this->connectTimeout = $value['connect_timeout'];
            unset($value['connect_timeout']);
        }

        if (array_key_exists('queue_name', $value)) {
            $this->_usedProperties['queueName'] = true;
            $this->queueName = $value['queue_name'];
            unset($value['queue_name']);
        }

        if (array_key_exists('exchange_name', $value)) {
            $this->_usedProperties['exchangeName'] = true;
            $this->exchangeName = $value['exchange_name'];
            unset($value['exchange_name']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['host'])) {
            $output['host'] = $this->host;
        }
        if (isset($this->_usedProperties['port'])) {
            $output['port'] = $this->port;
        }
        if (isset($this->_usedProperties['login'])) {
            $output['login'] = $this->login;
        }
        if (isset($this->_usedProperties['password'])) {
            $output['password'] = $this->password;
        }
        if (isset($this->_usedProperties['vhost'])) {
            $output['vhost'] = $this->vhost;
        }
        if (isset($this->_usedProperties['readTimeout'])) {
            $output['read_timeout'] = $this->readTimeout;
        }
        if (isset($this->_usedProperties['writeTimeout'])) {
            $output['write_timeout'] = $this->writeTimeout;
        }
        if (isset($this->_usedProperties['connectTimeout'])) {
            $output['connect_timeout'] = $this->connectTimeout;
        }
        if (isset($this->_usedProperties['queueName'])) {
            $output['queue_name'] = $this->queueName;
        }
        if (isset($this->_usedProperties['exchangeName'])) {
            $output['exchange_name'] = $this->exchangeName;
        }

        return $output;
    }

}
