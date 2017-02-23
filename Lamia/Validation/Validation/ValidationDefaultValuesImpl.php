<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 22.7.2016
 * Time: 15:59
 */

namespace Lamia\Validation\Validation;

use Lamia\Validation\Validation\Interfaces\ValidationDefaultValues;

class ValidationDefaultValuesImpl implements ValidationDefaultValues
{
    private $defaults;
    
    public function __construct($path)
    {
        $this->defaults = $this->getConfig($path);
    }

    private function getConfig($path)
    {
        if (isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] !== '') {
            return include $_SERVER['DOCUMENT_ROOT'] . '/' . $path;
        }
        return include $_SERVER['DOCUMENT_ROOT'] . $path;
    }

    public function getValues()
    {
        return $this->defaults;
    }
}