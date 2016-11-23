<?php
namespace Parishop\Abac\Operators;

class IsEqual implements Operator
{
    /**
     * @param mixed $value1
     * @param mixed $value2
     * @return bool
     */
    public function result($value1, $value2)
    {
        return $value1 === $value2;
    }
}