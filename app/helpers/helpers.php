<?php

/**
 * @return array
 */
function getApiRoutes(): array
{
    return collect(app()->routes->getRoutesByName())->flatMap(
        function (\Illuminate\Routing\Route $route) {
            return [$route->getName() => url($route->uri)];
        }
    )->filter(
        function (string $uri, string $name) {
            return starts_with($name, 'api.');
        }
    )->toArray();
}
