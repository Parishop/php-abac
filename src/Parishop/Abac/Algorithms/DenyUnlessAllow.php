<?php
namespace Parishop\Abac\Algorithms;

/**
 * Class DenyUnlessAllow
 * @package Parishop\Abac\Algorithms
 */
class DenyUnlessAllow extends AlgorithmDeny
{
    public function result(array $result = [])
    {
        foreach($result as $effect) {
            if($effect->result === 'allow') {
                return true;
            }
        }

        return $this->defaultResult();
    }

}

