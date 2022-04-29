<?php

namespace Lucas\AjaxInModal;

use Lucas\AjaxInModal\Controllers\PersonController;
use Lucas\AjaxInModal\Persistence\PersonRepository;
use Lucas\AjaxInModal\Routing\Router;
use PDO;

class App
{
    public function run()
    {
        $personController = new PersonController(
            personRepository: new PersonRepository(
                connection: new PDO(
                    "sqlite:../database/people.db"
                )
            )
        );

        $this->configureCors();

        $router = new Router();
        $router
            ->withHandler("GET", '/', $personController->list(...))
            ->withHandler("GET", '/person/update', $personController->showUpdateForm(...))
            ->withHandler("POST", '/person/update', $personController->update(...))
            ->withHandler("GET", '/person/create', $personController->showCreateForm(...))
            ->withHandler("POST", '/person/create', $personController->create(...))
            ->dispatch($_SERVER['REQUEST_METHOD'], explode("?", $_SERVER['REQUEST_URI'])[0]);
    }

    public function configureCors(): void
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: *");
    }
}
