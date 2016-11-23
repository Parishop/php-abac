<?php
namespace Parishop\Abac\Algorithms;

/**
 * Class DenyAllDeny
 * @package Parishop\Abac\Algorithms
 */
class DenyAllDeny extends AlgorithmAllow
{
    public function result(array $result = [])
    {
        foreach($result as $effect) {
            if($effect->result !== 'deny') {
                return $this->defaultResult();
            }
        }

        return false;
    }

}

