<?php
namespace Parishop\AbacBundle\HTTPProcessors;

/**
 * Class Targets
 * @package Parishop\AbacBundle\HTTPProcessors
 */
class Targets extends \Parishop\Processors\AdminProtected
{
    /**
     * @param \PHPixie\HTTP\Request $value
     * @return \PHPixie\Template\Container
     * @throws \PHPixie\Processors\Exception
     * @since 1.0
     */
    public function process($value)
    {
        if($this->user()) {
            return parent::process($value);
        }

        return $this->container($value->attributes()->get('bundle') . ':auth/login', $value);
    }

    public function defaultAction()
    {
        return $this->container;
    }

}

