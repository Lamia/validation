<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 14:27
 */

namespace Lamia\Validation\Validation\Interfaces;

use Lamia\Validation\Exception\FieldValidationFailedException;

/**
 * Interface TypeValidation
 * @package Lamia\Validation\Validation\Interfaces
 * The basic validation unit
 */
interface TypeValidation
{
    /**
     * validates a given field against given constraints 
     * @param string $name of the field
     * @param mixed $value to be validated
     * @param array $constraints of validation constraints (for example min => 1 etc)
     * @throws FieldValidationFailedException if the validation failed
     */
    public function validate($name, $value, array $constraints);
}