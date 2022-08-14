<?php

namespace App\Interfaces\Helpers\Validator;

interface ValidatorInterface
{
    const REQUIRED         = 'required';
    const REQUIRED_IF_R    = 'required_if';
    const NULLABLE         = 'nullable';
    const EXISTS_R         = 'exists';
    const CAMP_STRING      = 'string';
    const CAMP_URL         = 'url';
    const CAMP_CONCATENATE = '|';
    const NUMERIC_CAMP     = 'numeric';
    const UNIQUE_CAMP      = 'unique:';
    const EMAIL_CAMP       = 'email';
    const MIN_CAMP         = 'min:';
    const MAX_CAMP         = 'max:';
    const IN_CAMP          = 'in';
    const MIN_MESSAGE      = '.min';
    const MAX_MESSAGE      = '.max';
    const DATE        = 'date';
    const BEFORE      = 'before:';
    const AFTER       = 'after:';
    const DATE_FORMAT = 'date_format';
    const DATE_FORMAT_FORMAT_STANDAR = 'date_format:Y-m-d';
    const UUID = 'uuid';
    const REQUIRED_WITH_OUT = 'required_without:';
    const REQUIRED_WITH     = 'required_with:';
    const REQUIRED_IF       = 'required_if:';
    const EXISTS            = 'exists:';
    const BOOLEAN           = 'boolean';
    const INTEGER           = 'integer';
    const SOMETIMES = 'sometimes';
    const ARRAY_RULE = 'array';


}
