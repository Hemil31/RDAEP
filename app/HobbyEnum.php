<?php

namespace App;

enum HobbyEnum: int
{
    case READING = 1;
    case TRAVELING = 2;
    case PHOTOGRAPHY = 3;
    case GAMING = 4;

    public function label(): string
    {
        return match($this) {
            self::READING => 'Reading',
            self::TRAVELING => 'Traveling',
            self::PHOTOGRAPHY => 'Photography',
            self::GAMING => 'Gaming',
        };
    }
}
