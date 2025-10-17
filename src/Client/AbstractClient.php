<?php

namespace CakeDC\DebugKitAI\Client;

use CakeDC\DebugKitAI\Enum\Prompt;

abstract class AbstractClient
{

    public abstract function sendPrompt(Prompt $prompt, string $info): string;

}
