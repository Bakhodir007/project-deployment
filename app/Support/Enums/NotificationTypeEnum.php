<?php

namespace App\Support\Enums;

enum NotificationTypeEnum: string
{
    public static function getAllValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public const SUCCESS = 'notification.success';
    public const ERROR = 'notification.error';
    public const WARNING = 'notification.warning';

}
