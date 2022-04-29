<?php

namespace Lucas\AjaxInModal\Routing;

class Router
{
    public function __construct(private array $handlers = [])
    {
    }

    public function withHandler(
        string $method,
        string $route,
        callable $handler
    ): self {
        $this->handlers[$method][$route] = $handler;
        return $this;
    }

    public function dispatch(string $method, string $url): callable
    {
        return $this?->handlers[$method][$url]() ?? $this?->handlers['GET']['/error/not-found'] ?? fn () => "404 Page Not Found";
    }
}
