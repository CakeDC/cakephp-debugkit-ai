<?php

namespace CakeDC\DebugKitAI\Client;

use Cake\Core\Configure;
use CakeDC\DebugKitAI\Enum\Prompt;

class Gemini extends AbstractClient
{

    /**
     * @param Prompt $prompt
     * @param string $info
     * @return string
     */
    public function sendPrompt(Prompt $prompt, string $info): string
    {
        $client = \Gemini::client(Configure::read('DebugKit.AI.apiKey'));
        $prompt = sprintf($prompt->getTemplate(), $info);
        $result = $client->generativeModel(Configure::read('DebugKit.AI.model'))->generateContent($prompt);

        return $result->text();
    }
}
