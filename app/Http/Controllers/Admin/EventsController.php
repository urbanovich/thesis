<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventsRequest;
use App\Models\Events;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EventsController
 * @package App\Http\Controllers\Admin
 */
class EventsController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;
    use FetchOperation;

    /**
     * @throws \Exception
     */
    public function setup()
    {
        $this->crud->setModel(Events::class);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/events');
        $this->crud->setEntityNameStrings('event', 'events');
    }

    /**
     *
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name', // The db column name
            'label' => "Event Name", // Table column heading
            'type' => 'text'
        ]);

        $this->crud->enableExportButtons();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(EventsRequest::class);
        $this->crud->setOperationSetting('contentClass', 'col-md-12');

        CRUD::addField('name');
        CRUD::addField('data');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
