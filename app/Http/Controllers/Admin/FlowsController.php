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

        $this->crud->orderFields(['name']);

        $this->crud->enableExportButtons();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FlowsRequest::class);
        $this->crud->setOperationSetting('contentClass', 'col-md-12');

        CRUD::addField('name');


        CRUD::addField(
            [
                'name' => 'flow',
                'label' => 'Task',
                'type' => 'repeatable',
                'fake' => true,
                'store_in' => 'extras',
                'fields' => [
                    [    // SELECT
                        'label'             => 'Event',
                        'type'              => 'select',
                        'name'              => 'event',
                        'entity'            => 'events',
                        'attribute'         => 'name',
                        'model'             => "App\Models\Events",
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-7'
                        ],
                    ],
                    [   // select_from_array
                        'name' => 'wait',
                        'label' => 'Wait(hours)',
                        'type' => 'select_from_array',
                        'options' => [
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '6' => '6',
                            '9' => '9',
                            '12' => '12',
                            '24' => '24',
                            '48' => '48',
                            '72' => '72',
                        ],
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-7'
                        ],
                    ],
                    [    // SELECT
                        'label'             => 'Template',
                        'type'              => 'select',
                        'name'              => 'template',
                        'entity'            => 'templates',
                        'attribute'         => 'name',
                        'model'             => "App\Models\Templates",
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-7'
                        ],
                    ],
                    [
                        'name'    => 'radio', // the name of the db column
                        'label'   => 'Status (radio)', // the input label
                        'type'    => 'radio',
                        'options' => [ // the key will be stored in the db, the value will be shown as label;
                            0 => 'Draft',
                            1 => 'Published',
                            2 => 'Other',
                        ],
                        // optional
                        'inline' => true, // show the radios all on the same line?
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
