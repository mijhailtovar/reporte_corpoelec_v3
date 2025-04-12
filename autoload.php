<?php

function controllers_autoload($controller_name)
{
    include_once 'controllers/' . $controller_name . '.php';
}

spl_autoload_register('controllers_autoload');