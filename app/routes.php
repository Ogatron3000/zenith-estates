<?php

// Welcome
$router->get('', 'WelcomeController@index');

// Real Estates
$router->get('real-estates', 'RealEstateController@index');
$router->get('real-estates/create', 'RealEstateController@create');
$router->get('real-estates/{id}', 'RealEstateController@show');
$router->post('real-estates', 'RealEstateController@store');
$router->get('real-estates/{id}/edit', 'RealEstateController@edit');
$router->put('real-estates/{id}', 'RealEstateController@update');
$router->delete('real-estates/{id}', 'RealEstateController@destroy');

// Cities
$router->get('cities', 'CityController@index');
$router->post('cities', 'CityController@store');
$router->get('cities/{id}/edit', 'CityController@edit');
$router->put('cities/{id}', 'CityController@update');
$router->delete('cities/{id}', 'CityController@destroy');

// Real Estate Types
$router->get('re-types', 'ReTypeController@index');
$router->post('re-types', 'ReTypeController@store');
$router->get('re-types/{id}/edit', 'ReTypeController@edit');
$router->put('re-types/{id}', 'ReTypeController@update');
$router->delete('re-types/{id}', 'ReTypeController@destroy');



