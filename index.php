<?php

require 'vendor/autoload.php';
require 'core/helpers.php';

use Core\{App, Request, Router, Database\Connection};

App::bind('database', Connection::make(require 'config.php'));

Router::load('app/routes.php')->direct(Request::uri(), Request::method());