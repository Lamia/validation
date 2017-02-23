<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 27.7.2016
 * Time: 17:36
 */

namespace Lamia\Validation\Validation;


class DefaultValidation extends AbstractValidation
{
    protected function afterValidation($name, $value, array $constraints)
    {
        // Does nothing
    }
    
    protected function getConfigKey($name)
    {
        return $name;
    }
}