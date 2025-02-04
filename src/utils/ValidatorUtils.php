<?php

namespace App\utils;

use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ValidatorUtils
{

    private function __construct(){}

    public static function validateObject($validateDto,ValidatorInterface $validator): array
    {

        $errors = $validator->validate($validateDto);
        $errorMessages = [];

        if (count($errors) > 0) {

            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
        }

        return $errorMessages;
    }

    public static function validateString($validateString): bool
    {
        return ctype_alnum($validateString);
    }
}