<?php
namespace Parishop\AbacBundle\HTTPProcessors;

/**
 * Class Home
 * @package Parishop\AbacBundle\HTTPProcessors
 */
class Home extends \Parishop\Processors\AdminProtected
{
    public function defaultAction()
    {
        return $this->container;
    }
}

