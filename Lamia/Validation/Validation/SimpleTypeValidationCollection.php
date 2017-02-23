<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 15:21
 */

namespace Lamia\Validation\Validation;

use Lamia\Validation\Validation\Interfaces\TypeValidation;
use Lamia\Validation\Validation\Interfaces\TypeValidationCollection;

class SimpleTypeValidationCollection implements TypeValidationCollection
{
    private $validations;
    
    public function __construct()
    {
        $this->validations = array();
    }
    
    public function add($type, TypeValidation $validation)
    {
        $this->validations[$type] = $validation;
    }
    
    public function get($type)
    {
        if (isset($this->validations[$type]) === false) {
            return false;
        }
        return $this->validations[$type];
    }
}