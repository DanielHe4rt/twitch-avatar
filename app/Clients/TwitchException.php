<?php

namespace App\Clients;

use Exception;

class TwitchException extends Exception
{
    public static function userNotFound(string $username): self
    {
        $message = sprintf('User %s doesn\'t exists.', $username);
        return new self($message, 404);
    }
}
