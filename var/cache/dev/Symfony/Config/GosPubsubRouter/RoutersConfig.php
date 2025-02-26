<?php

namespace Symfony\Config\GosPubsubRouter;

require_once __DIR__.\DIRECTORY_SEPARATOR.'RoutersConfig'.\DIRECTORY_SEPARATOR.'ResourcesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RoutersConfig 
{
    private $resources;
    private $_usedProperties = [];

    /**
     * @template TValue
     * @param TValue $value
     * @return \Symfony\Config\GosPubsubRouter\RoutersConfig\ResourcesConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\GosPubsubRouter\RoutersConfig\ResourcesConfig : static)
     */
    public function resources(mixed $value = []): \Symfony\Config\GosPubsubRouter\RoutersConfig\ResourcesConfig|static
    {
        $this->_usedProperties['resources'] = true;
        if (!\is_array($value)) {
            $this->resources[] = $value;

            return $this;
        }

        return $this->resources[] = new \Symfony\Config\GosPubsubRouter\RoutersConfig\ResourcesConfig($value);
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('resources', $value)) {
            $this->_usedProperties['resources'] = true;
            $this->resources = array_map(fn ($v) => \is_array($v) ? new \Symfony\Config\GosPubsubRouter\RoutersConfig\ResourcesConfig($v) : $v, $value['resources']);
            unset($value['resources']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['resources'])) {
            $output['resources'] = array_map(fn ($v) => $v instanceof \Symfony\Config\GosPubsubRouter\RoutersConfig\ResourcesConfig ? $v->toArray() : $v, $this->resources);
        }

        return $output;
    }

}
