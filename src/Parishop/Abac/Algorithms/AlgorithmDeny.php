<?php
namespace Parishop\Abac\Algorithms;

/**
 * Class AlgorithmDeny
 * @package Parishop\Abac\Algorithms
 */
abstract class AlgorithmDeny implements Algorithm
{
    public function defaultResult()
    {
        return false;
    }

}
