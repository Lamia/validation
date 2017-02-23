<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 17:36
 */

namespace Lamia\Validation\Tests\Validation;

use Lamia\Validation\Exception\FieldValidationFailedException;
use Lamia\Validation\Validation\TypeValidation\BooleanValidation;

class BooleanValidationTest extends \PHPUnit_Framework_TestCase
{
    private $validation;
    private $utilsMock;

    public function setUp()
    {
        $this->utilsMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\ValidationUtils')->getMock();
        $defaults = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\ValidationDefaultValues')->getMock();
        $defaults->expects($this->once())->method('getValues')->will($this->returnValue(array('min' => 0, 'optional' => false, 'max' => 10000)));
        $this->validation = new BooleanValidation($this->utilsMock, $defaults);
    }

    /**
     * @param $value
     * @dataProvider providerTestHappyCases
     */
    public function testHappyCases($value)
    {
        $this->validation->validate('', $value, array('aa' => 'a'));
        $this->assertTrue(true);
    }

    public function providerTestHappyCases()
    {
        return array(
            array(true),
            array(false),
        );
    }

    /**
     * @param $value
     * @dataProvider providerTestSadCases
     */
    public function testSadCases($value)
    {
        $this->utilsMock->expects($this->once())->method('validateNotArrayOrObject')->with('aa', $value, 'boolean');
        $this->expectException(FieldValidationFailedException::class);
        $this->validation->validate('aa', $value, array());
    }


    public function providerTestSadCases()
    {
        return array(
            array(''),
            array(123),
            array('1'),
            array(null),
        );
    }
}