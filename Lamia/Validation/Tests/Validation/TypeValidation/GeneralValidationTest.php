<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 20.7.2016
 * Time: 11:38
 */

namespace Lamia\Validation\Tests\Validation;

use Lamia\Validation\Exception\FieldValidationFailedException;
use Lamia\Validation\Validation\TypeValidation\GeneralTypeValidation;

class GeneralValidationTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructorParameterNotCollection()
    {
        $this->expectException(\TypeError::class);
        new GeneralTypeValidation('aa', 'string');
    }

    public function testSuccessfulConstruction()
    {
        $collectionMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidationCollection')
            ->getMock();
        $collectionMock->expects($this->once())->method('get')->with('string')->will($this->returnValue(true));
        new GeneralTypeValidation($collectionMock, 'string');
    }

    public function testFailedConstruction()
    {
        $collectionMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidationCollection')
            ->getMock();
        $collectionMock->expects($this->once())->method('get')->with('string')->will($this->returnValue(false));
        $this->expectException(\Exception::class);
        new GeneralTypeValidation($collectionMock, 'string');
    }

    public function testDefaultValidation()
    {
        $collectionMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidationCollection')
            ->getMock();
        $validationMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidation')
            ->getMock();
        $validationMock->expects($this->once())->method('validate');
        $collectionMock->expects($this->exactly(2))->method('get')->will($this->returnValue($validationMock));

        $validation = new GeneralTypeValidation($collectionMock, 'string');
        $validation->validate('', 'aa', array());
        $this->assertTrue(true);
    }

    public function testNonDefaultValidation()
    {
        $collectionMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidationCollection')
            ->getMock();
        $validationMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidation')
            ->getMock();
        $validationMock->expects($this->once())->method('validate');
        $map = [
            ['string', $validationMock],
            ['int', $validationMock]
        ];
        $collectionMock->expects($this->exactly(2))->method('get')->will($this->returnValueMap($map));

        $validation = new GeneralTypeValidation($collectionMock, 'string');
        $validation->validate('', 'aa', array('type' => 'int'));
        $this->assertTrue(true);
    }

    public function testValidationNotInValidations()
    {
        $collectionMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidationCollection')
            ->getMock();
        $validationMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidation')
            ->getMock();
        $map = [
            ['string', $validationMock],
            ['int', false]
        ];
        $collectionMock->expects($this->exactly(2))->method('get')->will($this->returnValueMap($map));
        $validation = new GeneralTypeValidation($collectionMock, 'string');

        $this->expectException(FieldValidationFailedException::class);
        $validation->validate('', 'aa', array('type' => 'int'));
    }
}