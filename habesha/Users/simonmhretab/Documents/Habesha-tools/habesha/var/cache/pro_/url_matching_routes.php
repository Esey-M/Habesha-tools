<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/background-remover' => [[['_route' => 'app_background_remover', '_controller' => 'App\\Controller\\BackgroundRemoverController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/legal/terms' => [[['_route' => 'app_legal_terms', '_controller' => 'App\\Controller\\LegalController::terms'], null, null, null, false, false, null]],
        '/legal/privacy' => [[['_route' => 'app_legal_privacy', '_controller' => 'App\\Controller\\LegalController::privacy'], null, null, null, false, false, null]],
        '/logo-remover' => [[['_route' => 'app_logo_remover', '_controller' => 'App\\Controller\\LogoRemoverController::index'], null, null, null, true, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\SecurityController::register'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/background\\-remover/(?'
                    .'|success/([^/]++)(*:47)'
                    .'|batch/([^/]++)(*:68)'
                    .'|process/([^/]++)(*:91)'
                .')'
                .'|/logo\\-remover/(?'
                    .'|edit/([^/]++)(*:130)'
                    .'|process/([^/]++)(*:154)'
                    .'|success/([^/]++)(*:178)'
                .')'
                .'|/quiz(?:/(.*))?(*:202)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        47 => [[['_route' => 'app_background_remover_success', '_controller' => 'App\\Controller\\BackgroundRemoverController::success'], ['id'], null, null, false, true, null]],
        68 => [[['_route' => 'app_background_remover_batch', '_controller' => 'App\\Controller\\BackgroundRemoverController::batchProcess'], ['ids'], null, null, false, true, null]],
        91 => [[['_route' => 'app_background_remover_process', '_controller' => 'App\\Controller\\BackgroundRemoverController::process'], ['id'], ['POST' => 0], null, false, true, null]],
        130 => [[['_route' => 'app_logo_remover_edit', '_controller' => 'App\\Controller\\LogoRemoverController::edit'], ['id'], null, null, false, true, null]],
        154 => [[['_route' => 'app_logo_remover_process', '_controller' => 'App\\Controller\\LogoRemoverController::process'], ['id'], ['POST' => 0], null, false, true, null]],
        178 => [[['_route' => 'app_logo_remover_success', '_controller' => 'App\\Controller\\LogoRemoverController::success'], ['id'], null, null, false, true, null]],
        202 => [
            [['_route' => 'app_quiz', 'path' => null, '_controller' => 'App\\Controller\\QuizController::comingSoon'], ['path'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
