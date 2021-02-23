<?php

// Real Estates
$router->get('real-estates', 'RealEstateController@index');
$router->get('real-estates/{id}', 'RealEstateController@show');
$router->get('real-estates/create', 'RealEstateController@create');
$router->post('real-estates', 'RealEstateController@store');
$router->get('real-estates/edit', 'RealEstateController@edit');
$router->put('real-estates/{id}', 'RealEstateController@update');
$router->delete('real-estates/{id}', 'RealEstateController@destroy');

// Cities
$router->get('cities', 'CityController@index');
$router->get('cities/create', 'CityController@create');
$router->post('cities', 'CityController@store');
$router->get('cities/edit', 'CityController@store');
$router->put('cities/{id}', 'CityController@update');
$router->delete('cities/{id}', 'CityController@destroy');

// Ad Types
$router->get('ad-types', 'AdTypeController@index');
$router->post('ad-types', 'AdTypeController@store');
$router->put('ad-types/{id}', 'AdTypeController@update');
$router->delete('ad-types/{id}', 'AdTypeController@destroy');



