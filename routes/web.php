<?php

use App\Http\Service\CalculationService;
use Illuminate\Http\Request;

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () {
    return view('form');
});

$router->post('/calculate', function (Request $request) {
    $service = new CalculationService($request->input());
    return json_encode($service->calculate());
});
