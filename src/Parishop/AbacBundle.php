<?php
namespace Parishop;
class AbacBunlde extends \PHPixie\DefaultBundle
{
    protected function buildBuilder($frameworkBuilder)
    {
        return new AbacBundle\Builder($frameworkBuilder);
    }
}