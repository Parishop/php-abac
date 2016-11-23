<?php
namespace Parishop\Abac\Algorithms;

/**
 * Class AlgorithmAllow
 * @package Parishop\Abac\Algorithms
 */
abstract class AlgorithmAllow implements Algorithm
{
    public function defaultResult()
    {
        return true;
    }

}
