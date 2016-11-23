<?php
namespace Parishop\Abac;

/**
 * Class Operators
 * @package Parishop\Abac
 */
class Operators
{
    protected $operators = [];

    /**
     * @param string $name
     * @return Operators\Operator
     */
    public function get($name)
    {
        if(!array_key_exists($name, $this->operators)) {
            $className = 'Parishop\Abac\Operators\\' . implode('', array_map('ucfirst', explode('-', $name)));
            if(class_exists($className)) {
                $operator = new $className();
            } else {
                $operator = new Operators\IsEqual();
            }
            $this->operators[$name] = $operator;
        }

        return $this->operators[$name];
    }
}