<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 20.7.2016
 * Time: 12:50
 */

namespace Lamia\Validation\Tests\Validation;

use Lamia\Validation\Validation\SimpleTypeValidationCollection;

class SimpleTypeValidationCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testAddingAndGetting()
    {
        $validationMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidation')->getMock();
        $collection = new SimpleTypeValidationCollection();
        $collection->add('string', $validationMock);
        $collection->add('int', $validationMock);
        $collection->add('asdf', $validationMock);

        $this->assertEquals($validationMock, $collection->get('string'));
        $this->assertEquals($validationMock, $collection->get('int'));
        $this->assertEquals($validationMock, $collection->get('asdf'));
    }

    public function testGettingUnAdded()
    {
        $collection = new SimpleTypeValidationCollection();
        $this->assertFalse($collection->get('string'));

        $validationMock = $this->getMockBuilder('\Lamia\Validation\Validation\Interfaces\TypeValidation')->getMock();
        $collection->add('string', $validationMock);
        $this->assertFalse($collection->get('int'));
    }
}