<?php namespace Konafets\TYPO3DebugBar\DataCollectors;

use DebugBar\DataCollector\DataCollectorInterface;
use DebugBar\DataCollector\Renderable;

/**
 * Class AuthCollector
 *
 * @package Konafets\TYPO3DebugBar\DataCollectors
 * @author Stefano Kowalke <info@arroba-it.de>
 */
class AuthCollector extends BaseCollector implements DataCollectorInterface, Renderable
{

    /**
     * Called by the DebugBar when data needs to be collected
     *
     * @return string Collected data
     */
    function collect()
    {
        return $this->getUserInformation();
    }

    /**
     * Returns the unique name of the collector
     *
     * @return string
     */
    function getName()
    {
        return 'auth';
    }

    /**
     * Returns a hash where keys are control names and their values
     * an array of options as defined in {@see DebugBar\JavascriptRenderer::addControl()}
     *
     * @return array
     */
    function getWidgets()
    {
        $name = $this->getName();

        return [
            "{$name}" => [
                'icon' => 'user',
                'tooltip' => 'Auth status',
                'map' => 'auth.name',
                'default' => '',
            ],
        ];
    }

    private function getUserInformation()
    {
        return [
            'name' => htmlspecialchars($this->getBackendUser()->user['username']),
        ];
    }
}
