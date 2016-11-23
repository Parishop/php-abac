<?php
namespace Parishop\Tests\Abac;

class OperatorsTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Parishop\Abac\Operators */
    protected $operators;

    public function setUp()
    {
        $this->operators = new \Parishop\Abac\Operators();
    }

    public function testDefault()
    {
        $this->assertInstanceOf('Parishop\Abac\Operators\IsEqual', $this->operators->get('default'));
    }

    public function testIsEqual()
    {
        $this->assertInstanceOf('Parishop\Abac\Operators\IsEqual', $this->operators->get('isEqual'));
    }

}

