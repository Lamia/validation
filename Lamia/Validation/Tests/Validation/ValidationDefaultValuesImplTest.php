<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 22.7.2016
 * Time: 16:57
 */

namespace Lamia\Validation\Tests\Validation;

use Lamia\Validation\Validation\ValidationDefaultValuesImpl;

class ValidationDefaultValuesImplTest extends \PHPUnit_Framework_TestCase
{
    public function testGetters()
    {
        $defaults = new ValidationDefaultValuesImpl('Lamia/Validation/Tests/Validation/testValidationDefaults.php');
        $this->assertEquals(6, count($defaults->getValues()));
    }
}