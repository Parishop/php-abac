<?php
namespace Parishop\Tests\Abac;

class DecisionTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Parishop\Abac\Decision */
    protected $decision;

    public function setUp()
    {
        $slice  = new \PHPixie\Slice();
        $config = new \PHPixie\Config($slice);
        /** @var \PHPixie\Config\Storages\Type\Directory $directory */
        $directory      = $config->directory(dirname(__DIR__) . '/assets', 'config');
        $dbConfig       = $directory->arraySlice('database');
        $database       = new \PHPixie\Database($dbConfig);
        $ormConfig      = $directory->arraySlice('orm');
        $orm            = new \PHPixie\ORM($database, $ormConfig);
        $algorithms     = new \Parishop\Abac\Algorithms();
        $operators      = new \Parishop\Abac\Operators();
        $this->decision = new \Parishop\Abac\Decision($orm, $algorithms, $operators);
    }

    public function testAllow()
    {
        $result = [
            (object)[
                'result'      => 'allow',
                'obligations' => [],
                'recommends'  => [],
            ],
        ];
        $this->assertEquals($result, $this->decision->enforce('environment.bundle.abac', ['subject.userGroupId' => '1']));
    }

    public function testDeny()
    {
        $result = [
            (object)[
                'result'      => 'deny',
                'obligations' => [],
                'recommends'  => [],
            ],
        ];
        $this->assertEquals($result, $this->decision->enforce('environment.bundle.admin', ['subject.userGroupId' => '2']));
    }

    public function testWithOutPolicies()
    {
        $result = [
            (object)[
                'result'      => 'deny',
                'obligations' => [],
                'recommends'  => [],
            ],
        ];
        $this->assertEquals($result, $this->decision->enforce('environment.bundle.app', ['subject.userGroupId' => '1']));
    }

    public function testWithOutRules()
    {
        $result = [
            (object)[
                'result'      => 'deny',
                'obligations' => [],
                'recommends'  => [],
            ],
        ];
        $this->assertEquals($result, $this->decision->enforce('environment.bundle.admin', ['subject.userGroupId' => '1']));
    }

    public function testWithoutAttributes()
    {
        $result = [
            (object)[
                'result'      => 'deny',
                'obligations' => [],
                'recommends'  => [],
            ],
        ];
        $this->assertEquals($result, $this->decision->enforce('environment.bundle.abac'));
    }

}

