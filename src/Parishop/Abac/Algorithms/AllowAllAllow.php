<?php
namespace Parishop\Abac\Algorithms;

/**
 * Class AllowAllAllow
 * @package Parishop\Abac\Algorithms
 */
class AllowAllAllow extends AlgorithmDeny
{
    public function result(array $result = [])
    {
        foreach($result as $effect) {
            if($effect->result !== 'allow') {
                return $this->defaultResult();
            }
        }

        return true;
    }

}

