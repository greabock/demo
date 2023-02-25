<?php

declare(strict_types=1);

namespace Roman\Learn;

use ReflectionClass;
use ReflectionException;

class Container
{
    /**
     * @var array|callable[]
     */
    protected array $singletons = [];

    protected array $resolved = [];

    /**
     * @param class-string $abstract
     * @param callable $concrete
     * @return self
     */
    public function singleton(string $abstract, callable $concrete): self
    {
        $this->singletons[$abstract] = $concrete;

        return $this;
    }

    /**
     * @param class-string $class
     * @throws ReflectionException
     */
    public function make(string $class): object
    {
        if (isset($this->singletons[$class])) {
            return $this->singletons[$class]();
        }

        $reflection = new ReflectionClass($class);

        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return new $class;
        }

        $params = $constructor->getParameters();

        $paramValues = [];

        foreach ($params as $param) {
            $paramValues[] = $this->make($param->getType()->getName());
        }

        return new $class(...$paramValues);
    }

}
