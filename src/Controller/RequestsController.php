<?php
declare(strict_types=1);

namespace CakeDC\DebugKitAI\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use CakeDC\DebugKitAI\Client\AbstractClient;
use CakeDC\DebugKitAI\Enum\Prompt;

/**
 * Requests Controller
 *
 */
class RequestsController extends AppController
{
    public function htmlHelp()
    {
        //TODO
    }
    public function debugKitHelp()
    {
        $request = $this->getTableLocator()->get('DebugKit.Requests')->find()->contain(['Panels'])->orderByDesc('requested_at')->first();
        $panels = [];
        foreach ($request->panels as $panel) {
            if (in_array($panel->panel, Configure::read('DebugKit.AI.excludedPanels'))) continue;
            $panels[$panel->panel] = [
                'summary' => $panel->summary,
                'content' => $panel->content
            ];
        }
        $json = json_encode($panels);

        $response = Cache::remember("DebugKitAI.requests.{$request->id}.debugKitHelp.response", function () use ($json) {
            $clientClass = Configure::read('DebugKit.AI.client');
            /** @var AbstractClient $client */
            $client = new $clientClass();

            return $client->sendPrompt(Prompt::ANALYZE_DEBUGKIT_DATA, $json);
        });

        $this->viewBuilder()->disableAutoLayout();
        $this->viewBuilder()->setTemplate('help');
        $this->set('response', $response);

    }
}
