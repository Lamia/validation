<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 14:45
 */

namespace Lamia\Validation\Validation\TypeValidation;

use Lamia\Validation\Exception\FieldValidationFailedException;

class ArrayValidation extends AbstractTypeValidation
{
    public function validate($name, $value, array $constraints)
    {
        $min = isset($constraints[self::MIN]) ? $constraints[self::MIN] : $this->getDefaults()[self::MIN];
        $max = isset($constraints[self::MAX]) ? $constraints[self::MAX] : $this->getDefaults()[self::MAX];
        $optional = isset($constraints[self::OPTIONAL]) ? $constraints[self::OPTIONAL] : $this->getDefaults()[self::OPTIONAL];
        
        if ($this->getUtils()->validateEmptiness($name, $value, $optional)) {
            return;
        }
        if (is_array($value) === false) {
            throw new FieldValidationFailedException($name, ' must be valid array');
        }
        $this->getUtils()->validateInBounds($name, 'array length', count($value), $min, $max);
    }
}