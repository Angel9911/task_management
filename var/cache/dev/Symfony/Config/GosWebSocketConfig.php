<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'GosWebSocket'.\DIRECTORY_SEPARATOR.'AuthenticationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'GosWebSocket'.\DIRECTORY_SEPARATOR.'ClientConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'GosWebSocket'.\DIRECTORY_SEPARATOR.'ServerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'GosWebSocket'.\DIRECTORY_SEPARATOR.'PingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'GosWebSocket'.\DIRECTORY_SEPARATOR.'PushersConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'GosWebSocket'.\DIRECTORY_SEPARATOR.'WebsocketClientConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class GosWebSocketConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $authentication;
    private $client;
    private $server;
    private $ping;
    private $pushers;
    private $websocketClient;
    private $sharedConfig;
    private $origins;
    private $blockedIpAddresses;
    private $_usedProperties = [];

    /**
     * @default {"storage":{"type":"in_memory","pool":null,"id":null},"enable_authenticator":false}
    */
    public function authentication(array $value = []): \Symfony\Config\GosWebSocket\AuthenticationConfig
    {
        if (null === $this->authentication) {
            $this->_usedProperties['authentication'] = true;
            $this->authentication = new \Symfony\Config\GosWebSocket\AuthenticationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "authentication()" has already been initialized. You cannot pass values the second time you call authentication().');
        }

        return $this->authentication;
    }

    /**
     * @default {"firewall":"ws_firewall","storage":{"driver":"gos_web_socket.client.driver.in_memory","ttl":900,"prefix":""}}
     * @deprecated The child node "client" at path "gos_web_socket" is deprecated and will be removed in GosWebSocketBundle 4.0. Use the new websocket authentication API instead.
    */
    public function client(array $value = []): \Symfony\Config\GosWebSocket\ClientConfig
    {
        if (null === $this->client) {
            $this->_usedProperties['client'] = true;
            $this->client = new \Symfony\Config\GosWebSocket\ClientConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "client()" has already been initialized. You cannot pass values the second time you call client().');
        }

        return $this->client;
    }

    /**
     * @default {"tls":{"enabled":false,"options":[]},"origin_check":false,"ip_address_check":false,"keepalive_ping":false,"keepalive_interval":30}
    */
    public function server(array $value = []): \Symfony\Config\GosWebSocket\ServerConfig
    {
        if (null === $this->server) {
            $this->_usedProperties['server'] = true;
            $this->server = new \Symfony\Config\GosWebSocket\ServerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "server()" has already been initialized. You cannot pass values the second time you call server().');
        }

        return $this->server;
    }

    public function ping(array $value = []): \Symfony\Config\GosWebSocket\PingConfig
    {
        if (null === $this->ping) {
            $this->_usedProperties['ping'] = true;
            $this->ping = new \Symfony\Config\GosWebSocket\PingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "ping()" has already been initialized. You cannot pass values the second time you call ping().');
        }

        return $this->ping;
    }

    /**
     * @deprecated The child node "pushers" at path "gos_web_socket" is deprecated and will be removed in GosWebSocketBundle 4.0. Use the symfony/messenger component instead.
    */
    public function pushers(array $value = []): \Symfony\Config\GosWebSocket\PushersConfig
    {
        if (null === $this->pushers) {
            $this->_usedProperties['pushers'] = true;
            $this->pushers = new \Symfony\Config\GosWebSocket\PushersConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "pushers()" has already been initialized. You cannot pass values the second time you call pushers().');
        }

        return $this->pushers;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":false,"ssl":false,"origin":null}
     * @deprecated The child node "websocket_client" at path "gos_web_socket" is deprecated and will be removed in GosWebSocketBundle 4.0. Use the ratchet/pawl package instead.
     * @return \Symfony\Config\GosWebSocket\WebsocketClientConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\GosWebSocket\WebsocketClientConfig : static)
     */
    public function websocketClient(array $value = []): \Symfony\Config\GosWebSocket\WebsocketClientConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['websocketClient'] = true;
            $this->websocketClient = $value;

            return $this;
        }

        if (!$this->websocketClient instanceof \Symfony\Config\GosWebSocket\WebsocketClientConfig) {
            $this->_usedProperties['websocketClient'] = true;
            $this->websocketClient = new \Symfony\Config\GosWebSocket\WebsocketClientConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "websocketClient()" has already been initialized. You cannot pass values the second time you call websocketClient().');
        }

        return $this->websocketClient;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @deprecated The child node "shared_config" at path "gos_web_socket" is deprecated and will be removed in GosWebSocketBundle 4.0.
     * @return $this
     */
    public function sharedConfig($value): static
    {
        $this->_usedProperties['sharedConfig'] = true;
        $this->sharedConfig = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function origins(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['origins'] = true;
        $this->origins = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function blockedIpAddresses(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['blockedIpAddresses'] = true;
        $this->blockedIpAddresses = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'gos_web_socket';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('authentication', $value)) {
            $this->_usedProperties['authentication'] = true;
            $this->authentication = new \Symfony\Config\GosWebSocket\AuthenticationConfig($value['authentication']);
            unset($value['authentication']);
        }

        if (array_key_exists('client', $value)) {
            $this->_usedProperties['client'] = true;
            $this->client = new \Symfony\Config\GosWebSocket\ClientConfig($value['client']);
            unset($value['client']);
        }

        if (array_key_exists('server', $value)) {
            $this->_usedProperties['server'] = true;
            $this->server = new \Symfony\Config\GosWebSocket\ServerConfig($value['server']);
            unset($value['server']);
        }

        if (array_key_exists('ping', $value)) {
            $this->_usedProperties['ping'] = true;
            $this->ping = new \Symfony\Config\GosWebSocket\PingConfig($value['ping']);
            unset($value['ping']);
        }

        if (array_key_exists('pushers', $value)) {
            $this->_usedProperties['pushers'] = true;
            $this->pushers = new \Symfony\Config\GosWebSocket\PushersConfig($value['pushers']);
            unset($value['pushers']);
        }

        if (array_key_exists('websocket_client', $value)) {
            $this->_usedProperties['websocketClient'] = true;
            $this->websocketClient = \is_array($value['websocket_client']) ? new \Symfony\Config\GosWebSocket\WebsocketClientConfig($value['websocket_client']) : $value['websocket_client'];
            unset($value['websocket_client']);
        }

        if (array_key_exists('shared_config', $value)) {
            $this->_usedProperties['sharedConfig'] = true;
            $this->sharedConfig = $value['shared_config'];
            unset($value['shared_config']);
        }

        if (array_key_exists('origins', $value)) {
            $this->_usedProperties['origins'] = true;
            $this->origins = $value['origins'];
            unset($value['origins']);
        }

        if (array_key_exists('blocked_ip_addresses', $value)) {
            $this->_usedProperties['blockedIpAddresses'] = true;
            $this->blockedIpAddresses = $value['blocked_ip_addresses'];
            unset($value['blocked_ip_addresses']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['authentication'])) {
            $output['authentication'] = $this->authentication->toArray();
        }
        if (isset($this->_usedProperties['client'])) {
            $output['client'] = $this->client->toArray();
        }
        if (isset($this->_usedProperties['server'])) {
            $output['server'] = $this->server->toArray();
        }
        if (isset($this->_usedProperties['ping'])) {
            $output['ping'] = $this->ping->toArray();
        }
        if (isset($this->_usedProperties['pushers'])) {
            $output['pushers'] = $this->pushers->toArray();
        }
        if (isset($this->_usedProperties['websocketClient'])) {
            $output['websocket_client'] = $this->websocketClient instanceof \Symfony\Config\GosWebSocket\WebsocketClientConfig ? $this->websocketClient->toArray() : $this->websocketClient;
        }
        if (isset($this->_usedProperties['sharedConfig'])) {
            $output['shared_config'] = $this->sharedConfig;
        }
        if (isset($this->_usedProperties['origins'])) {
            $output['origins'] = $this->origins;
        }
        if (isset($this->_usedProperties['blockedIpAddresses'])) {
            $output['blocked_ip_addresses'] = $this->blockedIpAddresses;
        }

        return $output;
    }

}
