<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\DeffController::index'], null, null, null, false, false, null]],
        '/submit' => [[['_route' => 'form_email_submit', '_controller' => 'App\\Controller\\DeffController::handleForm'], null, ['POST' => 0], null, false, false, null]],
        '/homepage' => [[['_route' => 'homepage', '_controller' => 'App\\Controller\\DeffController::homepage'], null, null, null, false, false, null]],
        '/errors' => [[['_route' => 'errors', '_controller' => 'App\\Controller\\ErrorLogController::index'], null, null, null, false, false, null]],
        '/task/create' => [[['_route' => 'app_task_createtask', '_controller' => 'App\\Controller\\TaskController::createTask'], null, ['POST' => 0], null, false, false, null]],
        '/task/delete' => [[['_route' => 'app_task_deletetask', '_controller' => 'App\\Controller\\TaskController::deleteTask'], null, ['DELETE' => 0], null, false, false, null]],
        '/task/user' => [
            [['_route' => 'app_task_gettasksbystatusandusername', '_controller' => 'App\\Controller\\TaskController::getTasksByStatusAndUsername'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_task_gettasksbyusername', '_controller' => 'App\\Controller\\TaskController::getTasksByUsername'], null, ['GET' => 0], null, false, false, null],
        ],
        '/task/all' => [[['_route' => 'app_task_getalltasks', '_controller' => 'App\\Controller\\TaskController::getAllTasks'], null, ['GET' => 0], null, false, false, null]],
        '/user/create' => [[['_route' => 'app_user_createuser', '_controller' => 'App\\Controller\\UserController::createUser'], null, ['POST' => 0], null, false, false, null]],
        '/user/delete' => [[['_route' => 'app_user_deleteuser', '_controller' => 'App\\Controller\\UserController::deleteUser'], null, ['DELETE' => 0], null, false, false, null]],
        '/api/login' => [[['_route' => 'api_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/task/update/([^/]++)(*:28)'
                .'|/user/(?'
                    .'|update/([^/]++)(*:59)'
                    .'|tasks/([^/]++)(*:80)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        28 => [[['_route' => 'app_task_updatetask', '_controller' => 'App\\Controller\\TaskController::updateTask'], ['id'], ['PUT' => 0], null, false, true, null]],
        59 => [[['_route' => 'app_user_updateuser', '_controller' => 'App\\Controller\\UserController::updateUser'], ['id'], ['PUT' => 0], null, false, true, null]],
        80 => [
            [['_route' => 'app_user_getusertasksbyusername', '_controller' => 'App\\Controller\\UserController::getUserTasksByUsername'], ['username'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
