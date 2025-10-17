<?php

return [
    'DebugKit' => [
        'AI' => [
            'client' => \CakeDC\DebugKitAI\Client\Gemini::class,
            'model' => 'gemini-2.5-flash',
            'excludedPanels' => ['AI']
        ],
        'panels' => [
            'CakeDC/DebugKitAI.AI' => true
        ],
    ],
];
