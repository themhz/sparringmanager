<?php
namespace App\Validators;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
    public function validateDatetime($attribute, $value, $parameters)
    {
        // Replace the format string with your datetime format
        $format = 'Y-m-d H:i:s';

        $parsed = date_parse_from_format($format, $value);

        return ($parsed['error_count'] === 0 && $parsed['warning_count'] === 0);
    }
}
