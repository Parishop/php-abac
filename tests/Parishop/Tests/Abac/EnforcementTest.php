<?php
namespace Parishop\Tests\Abac;

class EnforcementTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Parishop\Abac\Enforcement */
    protected $enforcement;

    public function setUp()
    {
        $slice  = new \PHPixie\Slice();
        $config = new \PHPixie\Config($slice);
        /** @var \PHPixie\Config\Storages\Type\Directory $directory */
        $directory         = $config->directory(dirname(__DIR__) . '/assets', 'config');
        $dbConfig          = $directory->arraySlice('database');
        $database          = new \PHPixie\Database($dbConfig);
        $ormConfig         = $directory->arraySlice('orm');
        $orm               = new \PHPixie\ORM($database, $ormConfig);
        $algorithms        = new \Parishop\Abac\Algorithms();
        $operators         = new \Parishop\Abac\Operators();
        $decision          = new \Parishop\Abac\Decision($orm, $algorithms, $operators);
        $subject           = $orm->query('user')->in(1)->findOne();
        $environment       = $slice->arrayData(['bundle' => 'admin']);
        $this->enforcement = new \Parishop\Abac\Enforcement($decision, $algorithms, $subject, $environment, $subject);
    }

    public function testFalse()
    {
        $this->assertFalse($this->enforcement->enforce('environment.bundle.app', []));
    }

    public function testTrue()
    {
        $this->assertTrue($this->enforcement->enforce('environment.bundle.abac', []));
    }

}

