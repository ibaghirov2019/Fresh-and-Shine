<?php

/**
 * Class Router
 */
class Router
{

    /**
     * The property for storing the routing array
     */
    private $routes;


    public function __construct()
    {
        // File path with routing
        $routesPath = ROOT . '/config/routes.php';

        // Get the routing from the file
        $this->routes = include($routesPath);
    }

    /**
     * Returns the query string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Method for processing the request
     */
    public function run()
    {
        // We get the query string
        $uri = $this->getURI();

        // We check the availability of such a request in the route array (routes.php)
        foreach ($this->routes as $uriPattern => $path) {

            // Compare $ uriPattern and $ uri
            if (preg_match("~$uriPattern~", $uri)) {

                // We get the inner path from the outside according to the rule.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Define controller, action, parameters

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                // Connect the controller class file
                $controllerFile = ROOT . '/controllers/' .
                        $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Create an object, call a method (ie action)
                $controllerObject = new $controllerName;

                /* We call the necessary method ($ actionName) for a certain
                  * class ($ controllerObject) with the specified parameters ($ parameters)
                 */
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // If the controller method is successfully called, we terminate the router
                if ($result != null) {
                    break;
                }
            }
        }
    }

}
