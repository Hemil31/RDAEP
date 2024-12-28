<?php

namespace App;

enum GenderEnum: int
{
    case Male = 1;
    case Female = 2;
    case Other = 3;

    public function label(): string
    {
        return match($this) {
            self::Male => 'Male',
            self::Female => 'Female',
            self::Other => 'Other',
        };
    }
}
