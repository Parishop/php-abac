<?php
namespace Parishop\Abac\Algorithms;

/**
 * Interface Algorithm
 * @package Parishop\Abac\Algorithms
 */
interface Algorithm
{
    public function defaultResult();

    /**
     * @param array $result
     * @return bool
     */
    public function result(array $result = []);
}