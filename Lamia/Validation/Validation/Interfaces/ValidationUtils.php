<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 20.7.2016
 * Time: 16:32
 */

namespace Lamia\Validation\Validation\Interfaces;

use Lamia\Validation\Exception\FieldValidationFailedException;

/**
 * General validation utils that can be used by many classes
 * Interface ValidationUtils
 * @package Lamia\Validation\Validation\Interfaces
 */
interface ValidationUtils
{
    /**
     * Validate that the data is not array or object
     * @param string $name of the field
     * @param mixed $data to be validated
     * @throws  FieldValidationFailedException if the validation failed
     */
    function validateNotArrayOrObject($name, $data);

    /**
     * Validates that the limits are valid
     * @param string $name of the validated field
     * @param $lowerLimit
     * @param $upperLimit
     * @throws  FieldValidationFailedException if the validation failed
     */
    function validateLimits($name, $lowerLimit, $upperLimit);

    /**
     * Validates if the value is empty. Fails if is and is not optional field
     * @param string $name of the field to be validated
     * @param mixed $value to be validated
     * @param bool $optional if the value can be empty or not
     * @throws  FieldValidationFailedException if the validation failed
     */
    function validateEmptiness($name, $value, $optional);

    /**
     * Validates that the given value is inside given limits
     * @param string $name of the field to be validated
     * @param int $value to be validated
     * @param int $lowerLimit
     * @param int $upperLimit
     * @throws  FieldValidationFailedException if the validation failed
     */
    function validateInBounds($name, $value, $lowerLimit, $upperLimit);
}