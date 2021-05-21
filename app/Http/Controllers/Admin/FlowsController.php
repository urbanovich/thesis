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
use Illuminate\Support\Facades\Auth;

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
        $this->crud->setEntityNameStrings(
            trans('admin.add_flow'),
            trans('admin.flows')
        );

        $user = Auth::guard('backpack')->user();
        $this->crud->addClause('where', 'company_id', '=', $user->id);
    }

    /**
     *
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn(
            [
                'name' => 'name', // The db column name
                'label' => trans('admin.title'), // Table column heading
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

        CRUD::addField([
            'name' => 'name',
            'label' => trans('admin.title'),
       ]);

        CRUD::addField(
            [
                'name' => 'flow',
                'label' => trans('admin.task'),
                'type' => 'repeatable',
                'fake' => true,
                'store_in' => 'extras',
                'fields' => [
                    [    // SELECT
                        'label'             => trans('admin.event'),
                        'type'              => 'select',
                        'name'              => 'event_type',
                        'entity'            => 'events',
                        'attribute'         => 'name',
                        'model'             => "App\Models\EventTypes",
                        'wrapperAttributes' => [
                            'class' => 'form-group col-md-7'
                        ],
                    ],
                    [   // select_from_array
                        'name' => 'wait',
                        'label' => trans('admin.wait'),
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
                        'label'             => trans('admin.template'),
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
                        'name'    => 'logic', // the name of the db column
                        'label'   => trans('admin.use_logic'), // the input label
                        'type'    => 'radio',
                        'options' => [ // the key will be stored in the db, the value will be shown as label;
                            'and' => 'AND',
                            'or' => 'OR',
                        ],
                        // optional
                        'inline' => true, // show the radios all on the same line?
                    ],
                    [
                        'name'    => 'task_status', // the name of the db column
                        'label'   => trans('admin.task_status'), // the input label
                        'type'    => 'radio',
                        'options' => [ // the key will be stored in the db, the value will be shown as label;
                            'event' => trans('admin.event'),
                            'logic' => trans('admin.logically'),
                            'email' => trans('admin.email'),
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
