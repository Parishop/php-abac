<?php
namespace Parishop\Abac\Algorithms;

/**
 * Class AllowUnlessDeny
 * @package Parishop\Abac\Algorithms
 */
class AllowUnlessDeny extends AlgorithmAllow
{
    public function result(array $result = [])
    {
        foreach($result as $effect) {
            if($effect->result === 'deny') {
                return false;
            }
        }

        return $this->defaultResult();
    }

}

