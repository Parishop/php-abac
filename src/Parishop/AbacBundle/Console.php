<?php
namespace Parishop\AbacBundle;

class Console extends \PHPixie\DefaultBundle\Console
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * Constructor
     * @param Builder $builder
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    public function commandNames()
    {
        return [];
    }

}

