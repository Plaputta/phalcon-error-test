<?php

use Phalcon\Error\Application; // Do NOT use Phalcon\Mvc\Application for error handling!

define('APPLICATION_ENV', 'test');

error_reporting(E_ALL);

try {
    $loader = new Phalcon\Loader();

        $loader->registerNamespaces(array(
            'Phalcon' => '../library/Phalcon/'
        ))->register();

	/**
	 * Include services
	 */
	require __DIR__ . '/../config/services.php';

	/**
	 * Handle the request
	 */
	$application = new Application();

	/**
	 * Assign the DI
	 */
	$application->setDI($di);

	/**
	 * Include modules
	 */
	require __DIR__ . '/../config/modules.php';

	echo $application->handle()->getContent();

} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e){
	echo $e->getMessage();
}