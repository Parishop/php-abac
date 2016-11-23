<?php
namespace Parishop\AbacBundle;

/**
 * Class HTTPProcessor
 * @package Parishop\AbacBundle
 */
class HTTPProcessor extends \PHPixie\DefaultBundle\Processor\HTTP\Builder
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param Builder $builder
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    public function buildTargetsProcessor()
    {
        return new HTTPProcessors\Targets($this->builder);
    }

}

