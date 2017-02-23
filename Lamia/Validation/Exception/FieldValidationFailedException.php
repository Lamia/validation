<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 11.5.2016
 * Time: 16:31
 */

namespace Lamia\Validation\Exception;

use \Exception;

/**
 * Class FieldValidationFailedException
 * @package Verifone\Core\Exception
 * Thrown when validation of a field fails
 */
class FieldValidationFailedException extends Exception
{
    /**
     * FieldValidationFailedException constructor.
     * @param string $name of the field that has failed validation
     * @param string $message appended after "Validation failed, " -text
     */
    public function __construct($name, $message)
    {
        $name = $this->convertToString($name);
        $message = 'Validation failed for field ' . $name . ', ' . $message;
        parent::__construct($message);
    }

    private function convertToString($value)
    {
        if (is_array($value) || is_object($value)) {
            return print_r($value, true);
        }
        return $value;
    }
}