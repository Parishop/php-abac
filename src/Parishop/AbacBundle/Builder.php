<?php
namespace Parishop\AbacBundle;

/**
 * Class Builder
 * @package Parishop\AbacBundle
 */
class Builder extends \PHPixie\DefaultBundle\Builder
{
    /**
     * @type \PHPixie\BundleFramework\Builder
     */
    protected $frameworkBuilder;

    public function bundleName()
    {
        return 'abac';
    }

    /**
     * @return AuthRepositories
     */
    protected function buildAuthRepositories()
    {
        return new AuthRepositories($this);
    }

    /**
     * @return Console
     */
    protected function buildConsoleProvider()
    {
        return new Console($this);
    }

    /**
     * @return HTTPProcessor
     */
    protected function buildHttpProcessor()
    {
        return new HTTPProcessor($this);
    }

    /**
     * @return ORMWrappers
     */
    protected function buildORMWrappers()
    {
        return new ORMWrappers($this);
    }

    /**
     * @return string
     */
    protected function getRootDirectory()
    {
        return realpath(__DIR__ . '/../../../');
    }

}

