<?php
namespace Parishop\Abac\Operators;

/**
 * Interface Operator
 * @package Parishop\Abac\Operators
 */
interface Operator
{
    /**
     * @param mixed $value1
     * @param mixed $value2
     * @return bool
     */
    public function result($value1, $value2);
}