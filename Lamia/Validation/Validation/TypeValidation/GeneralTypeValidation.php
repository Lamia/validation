<?php
/**
 * Created by PhpStorm.
 * User: irina
 * Date: 19.7.2016
 * Time: 14:47
 */

namespace Lamia\Validation\Validation\TypeValidation;

use \Exception;
use Lamia\Validation\Exception\FieldValidationFailedException;
use Lamia\Validation\Validation\Interfaces\TypeValidation;
use Lamia\Validation\Validation\Interfaces\TypeValidationCollection;

class GeneralTypeValidation implements TypeValidation
{
    const TYPE = 'type';

    private $validations;
    private $defaultValidation;
    
    public function __construct(TypeValidationCollection $validations, $defaultValidation)
    {
        if ($validations->get($defaultValidation) === false) {
            throw new Exception(
                'Creating GeneralValidation failed because given ValidationCollection does not contain given default validation of type ' . $defaultValidation
            );
        }
        $this->defaultValidation = $defaultValidation;
        $this->validations = $validations;
    }

    public function validate($name, $value, array $constraints)
    {
        $type = isset($constraints[self::TYPE]) ? $constraints[self::TYPE] : $this->defaultValidation;

        $validation = $this->validations->get($type);
        if ($validation === false) {
            throw new FieldValidationFailedException($name, "can't find validation implementation for type " . $type);
        }

        $validation->validate($name, $value, $constraints);
    }
}