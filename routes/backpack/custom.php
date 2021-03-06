<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    $locale = \App::currentLocale();

    \App::setLocale('ru');

    if (\App::isLocale('ru')) {
        \App::setLocale('ru');
    }

    // -----
    // CRUDs
    // -----
    Route::crud('events', 'EventsController');
    Route::crud('flows', 'FlowsController');
    Route::crud('templates', 'TemplatesController');
    Route::crud('lists', 'ListsCrudController');
    Route::crud('customers', 'CustomersCrudController');
    Route::crud('companies', 'CompaniesCrudController');
    Route::crud('event_types', 'EventTypesCrudController');
}); // this should be the absolute last line of this file



/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
//Route::get('{page}/{subs?}', ['uses' => '\App\Http\Controllers\Frontend\PageController@index'])
//    ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);
