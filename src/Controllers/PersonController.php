<?php

namespace Lucas\AjaxInModal\Controllers;

use Lucas\AjaxInModal\Models\Person;
use Lucas\AjaxInModal\Persistence\PersonRepository;

class PersonController
{
    public function __construct(private PersonRepository $personRepository)
    {
    }

    public function showCreateForm(): void
    {
        renderInTemplate("person-form", [
            'title' => "Send person info",
            'viewData' => [
                'action' => "/person/create"
            ]
        ]);
    }

    public function showUpdateForm(): void
    {
        $name = filter_input(INPUT_GET, 'name');

        renderInTemplate("person-form", [
            'title' => "Update person info",
            'viewData' => [
                'action' => "/person/update",
                'person' => $this->personRepository->find($name)
            ]
        ]);
    }

    public function list(): void
    {
        renderInTemplate("people", [
            'title' => "People",
            'viewData' => [
                'people' => $this->personRepository->findAll()
            ]
        ]);
    }

    public function create(): void
    {
        $name = filter_input(INPUT_POST, 'name');
        $age = filter_input(INPUT_POST, 'age');

        $this->personRepository->create(new Person($name, $age));
        redirect("/person/list");
    }

    public function update(): void
    {
        $name = filter_input(INPUT_POST, 'name');
        $age = filter_input(INPUT_POST, 'age');

        $this->personRepository->update(new Person($name, $age));
        redirect("/");
    }
}
