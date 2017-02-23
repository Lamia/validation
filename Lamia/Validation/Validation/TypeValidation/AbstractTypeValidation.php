<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 15:34
 */

namespace Lamia\Validation\Validation\TypeValidation;

use Lamia\Validation\Validation\Interfaces\TypeValidation;
use Lamia\Validation\Validation\Interfaces\ValidationDefaultValues;
use Lamia\Validation\Validation\Interfaces\ValidationUtils;

abstract class AbstractTypeValidation implements TypeValidation
{
    const MIN = 'min';
    const MAX = 'max';
    const FORMAT = 'format';
    const OPTIONAL = 'optional';
    const NUMERIC = 'numeric';
    const VALUES = 'values';
    
    private $utils;
    private $defaults;
    
    public function __construct(ValidationUtils $utils, ValidationDefaultValues $defaults)
    {
        $this->defaults = $defaults->getValues();
        $this->utils = $utils;
    }
    
    protected function getDefaults()
    {
        return $this->defaults;
    }
    
    protected function getUtils()
    {
        return $this->utils;
    }
}