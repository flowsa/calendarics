<?php
/**
 * calendarics plugin for Craft CMS 3.x
 *
 * Download and store calendar ics files
 *
 * @link      www.flowsa.com
 * @copyright Copyright (c) 2022 Flow
 */

namespace flowsa\calendarics\services;

use flowsa\calendarics\Calendarics;

use Craft;
use craft\base\Component;

/**
 * Calenderics Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Flow
 * @package   Calendarics
 * @since     1.0.0
 */
class Calenderics extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Calendarics::$plugin->calenderics->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (Calendarics::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
