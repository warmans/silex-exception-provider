<?php
namespace Warmans\Silex;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Converts PHP errors/warning/notices to catchable ErrorExceptions exceptions.
 *
 * @package SilexProvider
 */
class ExceptionProvider implements ServiceProviderInterface 
{
    public function register(Application $app) 
    {
        return;
    }

    public function boot(Application $app)
    {
        set_error_handler(function ($errno, $errstr, $errfile, $errline, array $errcontext) {
            // error was suppressed with the @-operator
            if (0 === error_reporting()) {
                return false;
            }
            throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
        });
    }

}
