<?php

namespace ErrorTest\Frontend;

use Phalcon\Loader,
	Phalcon\Mvc\View,
	Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
	Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{

	/**
	 * Registers the module auto-loader
	 */
	public function registerAutoloaders()
	{

		$loader = new Loader();

		$loader->registerNamespaces(array(
			'ErrorTest\Frontend\Controllers' => __DIR__ . '/controllers/',
			'ErrorTest\Frontend\Models' => __DIR__ . '/models/',
		));

		$loader->register();
	}

	/**
	 * Registers the module-only services
	 *
	 * @param Phalcon\DI $di
	 */
	public function registerServices($di)
	{

		/**
		 * Read configuration
		 */
		$di['config'] = function() {
            return new \Phalcon\Config(array(
                'error' => array(
                        'logger' => new \Phalcon\Logger\Adapter\Syslog('errorTestLog'),
                        'controller' => 'error',
                        'action' => 'phpError',
                ),
            	'application' => array(
            		'controllersDir' => __DIR__ . '/../controllers/',
            		'modelsDir' => __DIR__ . '/../models/',
            		'viewsDir' => __DIR__ . '/../views/'
            	)
            ));
        };


		/**
		 * Setting up the view component
		 */
		$di['view'] = function() {
			$view = new View();
			$view->setViewsDir(__DIR__ . '/views/');
			return $view;
		};

	}

}