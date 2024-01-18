<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasLabel {
    case EDITOR = 'redaktør';
    case BOT = 'robot';
    case USER = 'bruger';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::USER => 'Bruger',
            self::BOT => 'Robot',
            self::EDITOR => 'Redaktør',
        };
    }
}