<?php
namespace Parishop\Tests\Abac\Algorithms;

class AllowUnlessDenyTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Parishop\Abac\Algorithms\AllowUnlessDeny */
    protected $allowUnlessDeny;

    public function setUp()
    {
        $this->allowUnlessDeny = new \Parishop\Abac\Algorithms\AllowUnlessDeny();
    }

    public function testDefaultResult()
    {
        $this->assertTrue($this->allowUnlessDeny->defaultResult());
    }

    public function testResultFalse()
    {
        $result = [(object)['result' => 'allow'], (object)['result' => 'deny']];
        $this->assertFalse($this->allowUnlessDeny->result($result));
    }

    public function testResultTrue()
    {
        $result = [(object)['result' => 'allow'], (object)['result' => 'allow']];
        $this->assertTrue($this->allowUnlessDeny->result($result));
    }
}
