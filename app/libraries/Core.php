<?php
    /*
        Mapping the URL entered in the browser:
        1. Controller / Class
        2. Method
        3. Parameter

        Example: articulos/actualizar/4
        1. Controller   : articulos
        2. Method       : actualizar
        3. Parameter    : 4
    */

    class Core
    {
        // Default mapping in case these values are not passed by the URL
        protected $defaultController = 'pages';
        protected $defaultMethod     = 'index';
        protected $parameters        = [];

        // Call getURL() method when Core class is instantiated
        public function __construct()
        {
            # Get controller / method / parameter from URL
            $url = $this->getURL();

            # 1. GET THE CONTROLLER (THE CLASS)
            # 1.1. Validate whether the controller entered from URL exists in 'controllers' folder
            if (isset($url) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php'))
            {
                # If it exists set as controller by default
                $this->defaultController = ucwords($url[0]);
                unset($url[0]);
            }

            # 1.2. Require the controller and instance the Class
            require_once '../app/controllers/' . $this->defaultController . '.php';
            $this->defaultController = new $this->defaultController;

            # 2. GET THE METHOD
            # 2.1. Validate whether the method entered from URL exists as function (method) of the class of the controller
            if (isset($url[1]) && method_exists($this->defaultController, $url[1]))
            {
                # If it exists set as method by default
                $this->defaultMethod = $url[1];
                unset($url[1]);
            }

            # 3. GET THE PARAMETERS
            # 3.1. Validate whether the parameter entered from URL exists within the argument of the called method
            $this->parameters = $url ? array_values($url) : [];

            # 3.2. Call 'callback' with array parameters
            call_user_func_array([$this->defaultController, $this->defaultMethod], $this->parameters);
        }

        // GET variable is created from .htaccess in the folder 'public'
        public function getURL()
        {
            # Proof: show the URL
            // echo $_GET['url'];

            # Validate whether the GET variable exists (if a controller / method / parameter has been defined in the URL)
            if (isset($_GET['url']))
            {
                # Remove unnecessary spaces on the right and specify 'character_mask': '/' as URL separator
                $url = rtrim($_GET['url'], '/');
                # Sanitize the URL
                $url = filter_var($url, FILTER_SANITIZE_URL);
                # Separate controller / method / parameter into elements of an array
                $url = explode('/', $url);

                return $url;
            }
        }
    }
?>