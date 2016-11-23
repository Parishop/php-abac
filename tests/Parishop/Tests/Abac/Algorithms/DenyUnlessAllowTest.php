<?php
namespace Parishop\Tests\Abac\Algorithms;

class DenyUnlessAllowTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Parishop\Abac\Algorithms\DenyUnlessAllow */
    protected $denyUnlessAllow;

    public function setUp()
    {
        $this->denyUnlessAllow = new \Parishop\Abac\Algorithms\DenyUnlessAllow();
    }

    public function testDefaultResult()
    {
        $this->assertFalse($this->denyUnlessAllow->defaultResult());
    }

    public function testResultFalse()
    {
        $result = [(object)['result' => 'allow'], (object)['result' => 'deny']];
        $this->assertTrue($this->denyUnlessAllow->result($result));
    }

    public function testResultTrue()
    {
        $result = [(object)['result' => 'deny'], (object)['result' => 'deny']];
        $this->assertFalse($this->denyUnlessAllow->result($result));
    }
}
