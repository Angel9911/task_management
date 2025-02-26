<?php

namespace Symfony\Config\GosWebSocket\Authentication;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StorageConfig 
{
    private $type;
    private $pool;
    private $id;
    private $_usedProperties = [];

    /**
     * The type of storage for the websocket server authentication tokens.
     * @default 'in_memory'
     * @param ParamConfigurator|'in_memory'|'psr_cache'|'service' $value
     * @return $this
     */
    public function type($value): static
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;

        return $this;
    }

    /**
     * The cache pool to use when using the PSR cache storage.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function pool($value): static
    {
        $this->_usedProperties['pool'] = true;
        $this->pool = $value;

        return $this;
    }

    /**
     * The service ID to use when using the service storage.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function id($value): static
    {
        $this->_usedProperties['id'] = true;
        $this->id = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('type', $value)) {
            $this->_usedProperties['type'] = true;
            $this->type = $value['type'];
            unset($value['type']);
        }

        if (array_key_exists('pool', $value)) {
            $this->_usedProperties['pool'] = true;
            $this->pool = $value['pool'];
            unset($value['pool']);
        }

        if (array_key_exists('id', $value)) {
            $this->_usedProperties['id'] = true;
            $this->id = $value['id'];
            unset($value['id']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['pool'])) {
            $output['pool'] = $this->pool;
        }
        if (isset($this->_usedProperties['id'])) {
            $output['id'] = $this->id;
        }

        return $output;
    }

}
