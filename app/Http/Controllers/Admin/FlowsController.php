<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventsRequest;
use App\Http\Requests\FlowsRequest;
use App\Models\Events;
use App\Models\Flows;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FlowsController
 * @package App\Http\Controllers\Admin
 */
class FlowsController extends CrudController
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
        $this->crud->setModel(Flows::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/flows');
        $this->crud->setEntityNameStrings('flow', 'flows');
    }

    /**
     *
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn(
            [
                'name' => 'name', // The db column name
                'label' => "Flow Name", // Table column heading
                'type' => 'text'
            ]
        );

        $this->crud->enableExportButtons();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FlowsRequest::class);
        $this->crud->setOperationSetting('contentClass', 'col-md-12');

        CRUD::addField('name');

        CRUD::addField(
            [
                'name' => 'task',
                'label' => 'Task',
                'type' => 'repeatable',
                'fake' => true,
                'store_in' => 'extras',
                'fields' => [
                    [   // select_from_array
                        'name' => 'select_from_array',
                        'label' => 'Select_from_array',
                        'type' => 'select_from_array',
                        'options' => ['one' => 'One', 'two' => 'Two', 'three' => 'Three'],
                    ],
                    [
                        'name' => 'radio',
                        'label' => 'Radio',
                        'type' => 'radio',
                        'options' => [0 => 'Draft', 1 => 'Published', 2 => 'Other'],
                    ],
                ],
            ]
        );
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
