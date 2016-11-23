<?php
namespace Parishop\Tests\Abac\Algorithms;

class DenyAllDenyTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Parishop\Abac\Algorithms\DenyAllDeny */
    protected $denyAllDeny;

    public function setUp()
    {
        $this->denyAllDeny = new \Parishop\Abac\Algorithms\DenyAllDeny();
    }

    public function testDefaultResult()
    {
        $this->assertTrue($this->denyAllDeny->defaultResult());
    }

    public function testResultFalse()
    {
        $result = [(object)['result' => 'allow'], (object)['result' => 'deny']];
        $this->assertTrue($this->denyAllDeny->result($result));
    }

    public function testResultTrue()
    {
        $result = [(object)['result' => 'deny'], (object)['result' => 'deny']];
        $this->assertFalse($this->denyAllDeny->result($result));
    }
}
