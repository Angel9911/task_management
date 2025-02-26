<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
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
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/task/update/([^/]++)(*:223)'
                .'|/user/(?'
                    .'|update/([^/]++)(*:255)'
                    .'|tasks/([^/]++)(*:277)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        223 => [[['_route' => 'app_task_updatetask', '_controller' => 'App\\Controller\\TaskController::updateTask'], ['id'], ['PUT' => 0], null, false, true, null]],
        255 => [[['_route' => 'app_user_updateuser', '_controller' => 'App\\Controller\\UserController::updateUser'], ['id'], ['PUT' => 0], null, false, true, null]],
        277 => [
            [['_route' => 'app_user_getusertasksbyusername', '_controller' => 'App\\Controller\\UserController::getUserTasksByUsername'], ['username'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
