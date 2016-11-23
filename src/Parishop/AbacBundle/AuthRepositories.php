<?php
namespace Parishop\AbacBundle;

/**
 * Class AuthRepositories
 * @package Parishop\AbacBundle
 */
class AuthRepositories extends \PHPixie\Auth\Repositories\Registry\Builder
{
    /**
     * @type Builder
     */
    protected $builder;

    /**
     * AuthRepositories constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return \PHPixie\ORM\Drivers\Driver\PDO\Repository
     */
    protected function buildUserRepository()
    {
        return $this->builder->components()->orm()->repository('user');
    }

}

