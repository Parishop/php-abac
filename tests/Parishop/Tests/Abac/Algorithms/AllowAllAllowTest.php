<?php
namespace Parishop\Tests\Abac\Algorithms;

class AllowAllAllowTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Parishop\Abac\Algorithms\AllowAllAllow */
    protected $allowAllAllow;

    public function setUp()
    {
        $this->allowAllAllow = new \Parishop\Abac\Algorithms\AllowAllAllow();
    }

    public function testDefaultResult()
    {
        $this->assertFalse($this->allowAllAllow->defaultResult());
    }

    public function testResultFalse()
    {
        $result = [(object)['result' => 'allow'], (object)['result' => 'deny']];
        $this->assertFalse($this->allowAllAllow->result($result));
    }

    public function testResultTrue()
    {
        $result = [(object)['result' => 'allow'], (object)['result' => 'allow']];
        $this->assertTrue($this->allowAllAllow->result($result));
    }

}
