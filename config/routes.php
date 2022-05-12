<?php

use Slim\App;



return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');
    $app->post('/users', \App\Action\UserCreateAction::class);
    $app->post('/links', \App\Action\LinkCreateAction::class);
    $app->get('/caisse', \App\Action\LinksGetAction::class);
    $app->get('/page', function () {
        $page = new \App\Controllers\Page();
        $page->makePage();
    });

};