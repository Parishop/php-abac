<?php
namespace Parishop\AbacBundle;

/**
 * Class ORMWrappers
 * @package Parishop
 */
class ORMWrappers extends \PHPixie\ORM\Wrappers\Implementation
{
    /**
     * @var Builder
     */
    protected $builder;

    protected $databaseEntities = array(
        'abacTarget',
        'abacPolicy',
        'abacRule',
    );

    /**
     * ORMWrappers constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function actionAbacPolicyEntity($entity)
    {
        return new ORMWrappers\AbacPolicyEntity($entity, $this->builder);
    }

    public function actionAbacRuleEntity($repository)
    {
        return new ORMWrappers\AbacRuleEntity($repository, $this->builder);
    }

    public function actionAbacTargetEntity($entity)
    {
        return new ORMWrappers\AbacTargetEntity($entity, $this->builder);
    }

}

