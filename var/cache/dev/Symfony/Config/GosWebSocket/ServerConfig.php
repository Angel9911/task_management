<?php

namespace Symfony\Config\GosWebSocket;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Server'.\DIRECTORY_SEPARATOR.'TlsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Server'.\DIRECTORY_SEPARATOR.'RouterConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ServerConfig 
{
    private $host;
    private $port;
    private $tls;
    private $originCheck;
    private $ipAddressCheck;
    private $keepalivePing;
    private $keepaliveInterval;
    private $router;
    private $_usedProperties = [];

    /**
     * The host IP address on the server which connections for the websocket server are accepted.
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
     * The port on the server which connections for the websocket server are accepted.
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
     * @default {"enabled":false,"options":[]}
    */
    public function tls(array $value = []): \Symfony\Config\GosWebSocket\Server\TlsConfig
    {
        if (null === $this->tls) {
            $this->_usedProperties['tls'] = true;
            $this->tls = new \Symfony\Config\GosWebSocket\Server\TlsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "tls()" has already been initialized. You cannot pass values the second time you call tls().');
        }

        return $this->tls;
    }

    /**
     * Enables checking the Origin header of websocket connections for allowed values.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function originCheck($value): static
    {
        $this->_usedProperties['originCheck'] = true;
        $this->originCheck = $value;

        return $this;
    }

    /**
     * Enables checking the originating IP address of websocket connections for blocked addresses.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function ipAddressCheck($value): static
    {
        $this->_usedProperties['ipAddressCheck'] = true;
        $this->ipAddressCheck = $value;

        return $this;
    }

    /**
     * Flag indicating a keepalive ping should be enabled on the server.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function keepalivePing($value): static
    {
        $this->_usedProperties['keepalivePing'] = true;
        $this->keepalivePing = $value;

        return $this;
    }

    /**
     * The time in seconds between each keepalive ping.
     * @default 30
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function keepaliveInterval($value): static
    {
        $this->_usedProperties['keepaliveInterval'] = true;
        $this->keepaliveInterval = $value;

        return $this;
    }

    public function router(array $value = []): \Symfony\Config\GosWebSocket\Server\RouterConfig
    {
        if (null === $this->router) {
            $this->_usedProperties['router'] = true;
            $this->router = new \Symfony\Config\GosWebSocket\Server\RouterConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "router()" has already been initialized. You cannot pass values the second time you call router().');
        }

        return $this->router;
    }

    public function __construct(array $value = [])
    {
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

        if (array_key_exists('tls', $value)) {
            $this->_usedProperties['tls'] = true;
            $this->tls = new \Symfony\Config\GosWebSocket\Server\TlsConfig($value['tls']);
            unset($value['tls']);
        }

        if (array_key_exists('origin_check', $value)) {
            $this->_usedProperties['originCheck'] = true;
            $this->originCheck = $value['origin_check'];
            unset($value['origin_check']);
        }

        if (array_key_exists('ip_address_check', $value)) {
            $this->_usedProperties['ipAddressCheck'] = true;
            $this->ipAddressCheck = $value['ip_address_check'];
            unset($value['ip_address_check']);
        }

        if (array_key_exists('keepalive_ping', $value)) {
            $this->_usedProperties['keepalivePing'] = true;
            $this->keepalivePing = $value['keepalive_ping'];
            unset($value['keepalive_ping']);
        }

        if (array_key_exists('keepalive_interval', $value)) {
            $this->_usedProperties['keepaliveInterval'] = true;
            $this->keepaliveInterval = $value['keepalive_interval'];
            unset($value['keepalive_interval']);
        }

        if (array_key_exists('router', $value)) {
            $this->_usedProperties['router'] = true;
            $this->router = new \Symfony\Config\GosWebSocket\Server\RouterConfig($value['router']);
            unset($value['router']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['host'])) {
            $output['host'] = $this->host;
        }
        if (isset($this->_usedProperties['port'])) {
            $output['port'] = $this->port;
        }
        if (isset($this->_usedProperties['tls'])) {
            $output['tls'] = $this->tls->toArray();
        }
        if (isset($this->_usedProperties['originCheck'])) {
            $output['origin_check'] = $this->originCheck;
        }
        if (isset($this->_usedProperties['ipAddressCheck'])) {
            $output['ip_address_check'] = $this->ipAddressCheck;
        }
        if (isset($this->_usedProperties['keepalivePing'])) {
            $output['keepalive_ping'] = $this->keepalivePing;
        }
        if (isset($this->_usedProperties['keepaliveInterval'])) {
            $output['keepalive_interval'] = $this->keepaliveInterval;
        }
        if (isset($this->_usedProperties['router'])) {
            $output['router'] = $this->router->toArray();
        }

        return $output;
    }

}
