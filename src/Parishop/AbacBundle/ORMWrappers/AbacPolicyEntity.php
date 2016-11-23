<?php
namespace Parishop\AbacBundle\ORMWrappers;

/**
 * Class AbacPolicyEntity
 * @property \PHPixie\ORM\Relationships\Type\ManyToMany\Property\Entity $targets
 * @property \PHPixie\ORM\Relationships\Type\ManyToMany\Property\Entity $rules
 * @method \PHPixie\ORM\Loaders\Loader\Proxy\Editable|AbacTargetEntity[] targets()
 * @method \PHPixie\ORM\Loaders\Loader\Proxy\Editable|AbacRuleEntity[] rules()
 * @package Parishop\AbacBundle\HTTPProcessors
 */
class AbacPolicyEntity extends \PHPixie\ORM\Wrappers\Type\Database\Entity
{
    /**
     * @var \Parishop\AbacBundle\Builder
     */
    protected $builder;

    /**
     * AbacPolicyEntity constructor.
     * @param \PHPixie\ORM\Drivers\Driver\PDO\Entity $entity
     * @param \Parishop\AbacBundle\Builder           $builder
     */
    public function __construct($entity, $builder)
    {
        parent::__construct($entity);
        $this->builder = $builder;
    }

}

