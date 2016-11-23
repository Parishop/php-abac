<?php
namespace Parishop\Abac;

class Algorithms
{
    protected $algorithms = [];

    /**
     * @param string $name
     * @return Algorithms\Algorithm
     */
    public function get($name)
    {
        if(!array_key_exists($name, $this->algorithms)) {
            $className = 'Parishop\Abac\Algorithms\\' . implode('', array_map('ucfirst', explode('-', $name)));
            if(class_exists($className)) {
                $algorithm = new $className();
            } else {
                $algorithm = new Algorithms\DenyUnlessAllow();
            }
            $this->algorithms[$name] = $algorithm;
        }

        return $this->algorithms[$name];
    }
}