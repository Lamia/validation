<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 22.7.2016
 * Time: 15:55
 */

namespace Lamia\Validation\Validation\Interfaces;

/**
 * Interface ValidationDefaultValues
 * @package Lamia\Validation\Validation\Interfaces
 */
interface ValidationDefaultValues
{
    /**
     * @return array of default values for validation constraints
     */
    public function getValues();
}