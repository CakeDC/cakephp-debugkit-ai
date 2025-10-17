<?php

namespace CakeDC\DebugKitAI\Panel;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use DebugKit\DebugPanel;

class AIPanel extends DebugPanel
{
    public string $plugin = 'CakeDC/DebugKitAI';

    public function title(): string
    {
        return 'AI Help';
    }

    public function shutdown(EventInterface $event): void
    {
        /** @var Controller $controller */
        $controller = $event->getSubject();

        $this->_data = [
            'response' => (string)$controller->getResponse()->getBody()
        ];
    }
}
