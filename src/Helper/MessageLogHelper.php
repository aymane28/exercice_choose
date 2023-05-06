<?php

class MessageLogHelper
{
    public function printMessage(string $message, array $messageParamaters = []): void
    {
        echo strtr($message."\n", $messageParamaters);
    }
}