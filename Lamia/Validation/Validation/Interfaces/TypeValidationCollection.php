<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 14:52
 */

namespace Lamia\Validation\Validation\Interfaces;

/**
 * A collection of TypeValidatiosn
 * Interface TypeValidationCollection
 * @package Lamia\Validation\Validation\Interfaces
 */
interface TypeValidationCollection
{
    /**
     * @param string $type name to be mapped to TypeValidation (typically used as a type name in field conf)
     * @param TypeValidation $validation
     */
    public function add($type, TypeValidation $validation);

    /**
     * @param string $type name
     * @return TypeValidation corresponding to given $type
     */
    public function get($type);
}