<?php
namespace Parishop\Tests\Abac\Operators;

class IsEqualTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Parishop\Abac\Operators\IsEqual */
    protected $isEqual;

    public function setUp()
    {
        $this->isEqual = new \Parishop\Abac\Operators\IsEqual();
    }

    public function testFalse()
    {
        $this->assertFalse($this->isEqual->result(1, '1'));
    }

    public function testTrue()
    {
        $this->assertTrue($this->isEqual->result(1, 1));
    }

}

