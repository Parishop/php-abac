<?php
namespace Parishop\Tests;

class AbacTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Parishop\Abac
     */
    protected $abac;

    public function setUp()
    {
        $slice  = new \PHPixie\Slice();
        $config = new \PHPixie\Config($slice);
        /** @var \PHPixie\Config\Storages\Type\Directory $directory */
        $directory  = $config->directory(__DIR__ . '/assets', 'config');
        $dbConfig   = $directory->arraySlice('database');
        $database   = new \PHPixie\Database($dbConfig);
        $ormConfig  = $directory->arraySlice('orm');
        $orm        = new \PHPixie\ORM($database, $ormConfig);
        $subject    = $orm->query('user')->in(1)->findOne();
        $this->abac = new \Parishop\Abac($orm, $subject, $slice->arrayData(['bundle' => 'admin']));
    }

    public function testAlgorithms()
    {
        $this->assertInstanceOf('\Parishop\Abac\Algorithms', $this->abac->algorithms());
    }

    public function testDecision()
    {
        $this->assertInstanceOf('\Parishop\Abac\Decision', $this->abac->decision());
    }

    public function testEnforceFalse()
    {
        $this->assertFalse($this->abac->enforce('environment.bundle.app'));
    }

    public function testEnforceTrue()
    {
        $this->assertTrue($this->abac->enforce('environment.bundle.abac'));
    }

    public function testEnforcement()
    {
        $this->assertInstanceOf('\Parishop\Abac\Enforcement', $this->abac->enforcement());
    }

    public function testOperators()
    {
        $this->assertInstanceOf('\Parishop\Abac\Operators', $this->abac->operators());
    }

}

