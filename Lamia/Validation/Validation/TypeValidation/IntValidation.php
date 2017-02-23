<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 14:47
 */

namespace Lamia\Validation\Validation\TypeValidation;

use Lamia\Validation\Exception\FieldValidationFailedException;

class IntValidation extends AbstractTypeValidation
{
    public function validate($name, $value, array $constraints)
    {
        $min = isset($constraints[self::MIN]) ? $constraints[self::MIN] : $this->getDefaults()[self::MIN];
        $max = isset($constraints[self::MAX]) ? $constraints[self::MAX] : $this->getDefaults()[self::MAX];
        
        if (is_int($value) === false) {
            $this->getUtils()->validateNotArrayOrObject($name, $value, 'int');
            throw new FieldValidationFailedException($name, ' value should have been int but was ' . $value);
        }
        $this->getUtils()->validateInBounds($name, 'int value', $value, $min, $max);
    }
}