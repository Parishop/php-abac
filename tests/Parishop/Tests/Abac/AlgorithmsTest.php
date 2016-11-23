<?php
namespace Parishop\Tests\Abac;

class AlgorithmsTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Parishop\Abac\Algorithms */
    protected $algorithms;

    public function setUp()
    {
        $this->algorithms = new \Parishop\Abac\Algorithms();
    }

    public function testAllowAllAllow()
    {
        $this->assertInstanceOf('\Parishop\Abac\Algorithms\AllowAllAllow', $this->algorithms->get('allow-all-allow'));
    }

    public function testAllowUnlessDeny()
    {
        $this->assertInstanceOf('\Parishop\Abac\Algorithms\AllowUnlessDeny', $this->algorithms->get('allow-unless-deny'));
    }

    public function testDefault()
    {
        $this->assertInstanceOf('\Parishop\Abac\Algorithms\DenyUnlessAllow', $this->algorithms->get('default'));
    }

    public function testDenyAllDeny()
    {
        $this->assertInstanceOf('\Parishop\Abac\Algorithms\DenyAllDeny', $this->algorithms->get('deny-all-deny'));
    }

    public function testDenyUnlessAllow()
    {
        $this->assertInstanceOf('\Parishop\Abac\Algorithms\DenyUnlessAllow', $this->algorithms->get('deny-unless-allow'));
    }

}

