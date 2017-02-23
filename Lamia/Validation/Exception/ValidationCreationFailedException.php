<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 27.7.2016
 * Time: 15:22
 */

namespace Lamia\Validation\Exception;

use \Exception;

class ValidationCreationFailedException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 0, null);
    }
}