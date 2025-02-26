<?php

namespace Symfony\Config\GosPubsubRouter\RoutersConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $resource;
    private $type;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function resource($value): static
    {
        $this->_usedProperties['resource'] = true;
        $this->resource = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|'closure'|'container'|'glob'|'php'|'xml'|'yaml'|NULL $value
     * @return $this
     */
    public function type($value): static
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('resource', $value)) {
            $this->_usedProperties['resource'] = true;
            $this->resource = $value['resource'];
            unset($value['resource']);
        }

        if (array_key_exists('type', $value)) {
            $this->_usedProperties['type'] = true;
            $this->type = $value['type'];
            unset($value['type']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['resource'])) {
            $output['resource'] = $this->resource;
        }
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }

        return $output;
    }

}
