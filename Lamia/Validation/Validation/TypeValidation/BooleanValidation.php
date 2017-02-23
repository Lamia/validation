<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 14:46
 */

namespace Lamia\Validation\Validation\TypeValidation;

use Lamia\Validation\Exception\FieldValidationFailedException;

class BooleanValidation extends AbstractTypeValidation
{
    public function validate($name, $value, array $constraints)
    {
        if (is_bool($value) === false) {
            $this->getUtils()->validateNotArrayOrObject($name, $value, 'boolean');
            throw new FieldValidationFailedException($name, ' value should have been boolean but was ' . $value);
        }
    }
}