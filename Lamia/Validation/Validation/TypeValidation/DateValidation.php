<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 14:47
 */

namespace Lamia\Validation\Validation\TypeValidation;

use \DateTime;
use Lamia\Validation\Exception\FieldValidationFailedException;

class DateValidation extends AbstractTypeValidation
{
    public function validate($name, $value, array $constraints)
    {
        $format = isset($constraints[self::FORMAT]) ? $constraints[self::FORMAT] : $this->getDefaults()[self::FORMAT];
        if (!is_string($value) || $value === '') {
            $this->getUtils()->validateNotArrayOrObject($name, $value, 'date');
            throw new FieldValidationFailedException($name, "Date must be a non empty string, but was " . $value);
        }

        if (!is_string($format) || $format === '') {
            $this->getUtils()->validateNotArrayOrObject($name, $format, 'format');
            throw new FieldValidationFailedException($name, "Format must be a non empty string, but was " . $format);
        }

        $formattedDate = DateTime::createFromFormat($format, $value);
        if ($formattedDate && $formattedDate->format($format) === $value) {
            return;
        }
        throw new FieldValidationFailedException($name, "Date " . $value . " is not in a correct format " . $format);
    }
}