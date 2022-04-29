<?php
function render(string $view, array $data = []): void
{
    extract($data);
    require "../src/Views/{$view}.php";
}

function renderInTemplate(string $viewName, array $data = []): void
{
    render('template', [...$data, 'viewName' => $viewName]);
}

function redirect($url): never
{
    header("Access-Control-Expose-Headers: Location");
    header("Location: $url");
    exit;
}
