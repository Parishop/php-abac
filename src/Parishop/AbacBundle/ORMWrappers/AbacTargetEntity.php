<?php
namespace Parishop\AbacBundle\ORMWrappers;

/**
 * Class AbacTargetEntity
 * @property \PHPixie\ORM\Relationships\Type\ManyToMany\Property\Entity $policies
 * @method \PHPixie\ORM\Loaders\Loader\Proxy\Editable|AbacPolicyEntity[] policies()
 * @package Parishop\AbacBundle\ORMWrappers
 */
class AbacTargetEntity extends \PHPixie\ORM\Wrappers\Type\Database\Entity
{
    /**
     * @var \Parishop\AbacBundle\Builder
     */
    protected $builder;

    /**
     * AbacTargetEntity constructor.
     * @param \PHPixie\ORM\Drivers\Driver\PDO\Entity $entity
     * @param \Parishop\AbacBundle\Builder           $builder
     */
    public function __construct($entity, $builder)
    {
        parent::__construct($entity);
        $this->builder = $builder;
    }

}

