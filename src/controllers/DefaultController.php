<?php
/**
 * calendarics plugin for Craft CMS 3.x
 *
 * Download and store calendar ics files
 *
 * @link      www.flowsa.com
 * @copyright Copyright (c) 2022 Flow
 */

namespace flowsa\calendarics\controllers;


use Craft;
use craft\web\Controller;
use flowsa\calendarics\Calendarics;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Flow
 * @package   Calendarics
 * @since     1.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/calendarics/default
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $path = Craft::$app->path->runtimePath . '/calendarics/';

        $cache = $path . 'calender.ics';
        
        if(!is_dir($path)) {
            mkdir($path);
        }

        if(file_exists($cache) && filemtime($cache) > (time() - 86400)) {
            $file = file_get_contents($cache);
            return $file;
        }
        

        $response = file_get_contents("https://eur03.safelinks.protection.outlook.com/?url=https%3A%2F%2Foutlook.office365.com%2Fowa%2Fcalendar%2F5310cf284abd416eb713292b2dd98765%40brescia.co.za%2F0d504bbe03da449e8c2e81dcdfd1199f13419891378411011400%2Fcalendar.ics&data=04%7C01%7CMarketing%40brescia.co.za%7Cee87e31d55c9417ee6fe08d9e48e1094%7C1600f74693a64f8592c926482f3df2a2%7C0%7C0%7C637792121080665183%7CUnknown%7CTWFpbGZsb3d8eyJWIjoiMC4wLjAwMDAiLCJQIjoiV2luMzIiLCJBTiI6Ik1haWwiLCJXVCI6Mn0%3D%7C3000&sdata=j9q%2FuPnPy90FVU%2BT2dzZYZ8u1fcV9C6oG9i2HIMGnCY%3D&reserved=0");

        file_put_contents($cache, $response);

        return $response;
    }

    
}
