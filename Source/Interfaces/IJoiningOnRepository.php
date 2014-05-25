<?php

namespace Pinq\Interfaces;

/**
 * This API for the filter options available to a joining IRepository
 *
 * @author Elliot Levin <elliot@aanet.com.au>
 */
interface IJoiningOnRepository extends IJoiningOnTraversable
{
    /**
     * {@inheritDoc}
     * @return IJoiningToRepository
     */
    public function on(callable $function);

    /**
     * {@inheritDoc}
     * @return IJoiningToRepository
     */
    public function onEquality(callable $outerKeyFunction, callable $innerKeyFunction);
}
