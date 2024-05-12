<?php

namespace App\Helpers;

class RoleHelper
{
    const ADMIN = 'administrator';
    const STUDENT = 'student';
    const TEACHER = 'teacher';

    public static function getValues(): array
    {
        return [
            self::ADMIN,
            self::STUDENT,
            self::TEACHER,
        ];
    }

}