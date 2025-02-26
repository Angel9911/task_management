<?php

namespace Symfony\Config\GosWebSocket;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Authentication'.\DIRECTORY_SEPARATOR.'ProvidersConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Authentication'.\DIRECTORY_SEPARATOR.'StorageConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class AuthenticationConfig 
{
    private $providers;
    private $storage;
    private $enableAuthenticator;
    private $_usedProperties = [];

    public function providers(array $value = []): \Symfony\Config\GosWebSocket\Authentication\ProvidersConfig
    {
        if (null === $this->providers) {
            $this->_usedProperties['providers'] = true;
            $this->providers = new \Symfony\Config\GosWebSocket\Authentication\ProvidersConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "providers()" has already been initialized. You cannot pass values the second time you call providers().');
        }

        return $this->providers;
    }

    /**
     * @default {"type":"in_memory","pool":null,"id":null}
    */
    public function storage(array $value = []): \Symfony\Config\GosWebSocket\Authentication\StorageConfig
    {
        if (null === $this->storage) {
            $this->_usedProperties['storage'] = true;
            $this->storage = new \Symfony\Config\GosWebSocket\Authentication\StorageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "storage()" has already been initialized. You cannot pass values the second time you call storage().');
        }

        return $this->storage;
    }

    /**
     * Enables the new authenticator API.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enableAuthenticator($value): static
    {
        $this->_usedProperties['enableAuthenticator'] = true;
        $this->enableAuthenticator = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('providers', $value)) {
            $this->_usedProperties['providers'] = true;
            $this->providers = new \Symfony\Config\GosWebSocket\Authentication\ProvidersConfig($value['providers']);
            unset($value['providers']);
        }

        if (array_key_exists('storage', $value)) {
            $this->_usedProperties['storage'] = true;
            $this->storage = new \Symfony\Config\GosWebSocket\Authentication\StorageConfig($value['storage']);
            unset($value['storage']);
        }

        if (array_key_exists('enable_authenticator', $value)) {
            $this->_usedProperties['enableAuthenticator'] = true;
            $this->enableAuthenticator = $value['enable_authenticator'];
            unset($value['enable_authenticator']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['providers'])) {
            $output['providers'] = $this->providers->toArray();
        }
        if (isset($this->_usedProperties['storage'])) {
            $output['storage'] = $this->storage->toArray();
        }
        if (isset($this->_usedProperties['enableAuthenticator'])) {
            $output['enable_authenticator'] = $this->enableAuthenticator;
        }

        return $output;
    }

}
