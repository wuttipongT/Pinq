<?php

namespace Pinq\Queries;

use Pinq\Expressions as O;

/**
 * Implementation of the resolved parameter registry.
 *
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class ResolvedParameterRegistry implements IResolvedParameterRegistry
{
    /**
     * The resolved values of the parameters, indexed by their
     * respective parameter identifier.
     *
     * @var mixed[]
     */
    protected $resolvedParameters;

    public function __construct(array $resolvedParameters)
    {
        $this->resolvedParameters = $resolvedParameters;
    }

    /**
     * Returns an empty resolved parameter registry.
     *
     * @return ResolvedParameterRegistry
     */
    public static function none()
    {
        return new self([]);
    }

    public function getResolvedParameters()
    {
        return $this->resolvedParameters;
    }

    public function count()
    {
        return count($this->resolvedParameters);
    }

    public function offsetExists($parameter)
    {
        return array_key_exists($parameter, $this->resolvedParameters);
    }

    public function offsetGet($parameter)
    {
        if (!$this->offsetExists($parameter)) {
            throw new \Pinq\PinqException(
                    'Cannot retrieve parameter %s: parameter is not resolved',
                    $parameter);
        }

        return $this->resolvedParameters[$parameter];
    }

    public function offsetSet($offset, $value)
    {
        throw \Pinq\PinqException::notSupported(__METHOD__);
    }

    public function offsetUnset($offset)
    {
        throw \Pinq\PinqException::notSupported(__METHOD__);
    }
}
