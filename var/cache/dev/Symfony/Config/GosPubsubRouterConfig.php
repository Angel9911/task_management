<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'GosPubsubRouter'.\DIRECTORY_SEPARATOR.'RoutersConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class GosPubsubRouterConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $matcherClass;
    private $generatorClass;
    private $routerClass;
    private $routers;
    private $_usedProperties = [];

    /**
     * @default 'Gos\\Bundle\\PubSubRouterBundle\\Matcher\\CompiledMatcher'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function matcherClass($value): static
    {
        $this->_usedProperties['matcherClass'] = true;
        $this->matcherClass = $value;

        return $this;
    }

    /**
     * @default 'Gos\\Bundle\\PubSubRouterBundle\\Generator\\CompiledGenerator'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function generatorClass($value): static
    {
        $this->_usedProperties['generatorClass'] = true;
        $this->generatorClass = $value;

        return $this;
    }

    /**
     * @default 'Gos\\Bundle\\PubSubRouterBundle\\Router\\Router'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function routerClass($value): static
    {
        $this->_usedProperties['routerClass'] = true;
        $this->routerClass = $value;

        return $this;
    }

    public function routers(string $name, array $value = []): \Symfony\Config\GosPubsubRouter\RoutersConfig
    {
        if (!isset($this->routers[$name])) {
            $this->_usedProperties['routers'] = true;
            $this->routers[$name] = new \Symfony\Config\GosPubsubRouter\RoutersConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "routers()" has already been initialized. You cannot pass values the second time you call routers().');
        }

        return $this->routers[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'gos_pubsub_router';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('matcher_class', $value)) {
            $this->_usedProperties['matcherClass'] = true;
            $this->matcherClass = $value['matcher_class'];
            unset($value['matcher_class']);
        }

        if (array_key_exists('generator_class', $value)) {
            $this->_usedProperties['generatorClass'] = true;
            $this->generatorClass = $value['generator_class'];
            unset($value['generator_class']);
        }

        if (array_key_exists('router_class', $value)) {
            $this->_usedProperties['routerClass'] = true;
            $this->routerClass = $value['router_class'];
            unset($value['router_class']);
        }

        if (array_key_exists('routers', $value)) {
            $this->_usedProperties['routers'] = true;
            $this->routers = array_map(fn ($v) => new \Symfony\Config\GosPubsubRouter\RoutersConfig($v), $value['routers']);
            unset($value['routers']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['matcherClass'])) {
            $output['matcher_class'] = $this->matcherClass;
        }
        if (isset($this->_usedProperties['generatorClass'])) {
            $output['generator_class'] = $this->generatorClass;
        }
        if (isset($this->_usedProperties['routerClass'])) {
            $output['router_class'] = $this->routerClass;
        }
        if (isset($this->_usedProperties['routers'])) {
            $output['routers'] = array_map(fn ($v) => $v->toArray(), $this->routers);
        }

        return $output;
    }

}
