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
use Illuminate\Support\Facades\Auth;

/**
 * Class EventsController
 * @package App\Http\Controllers\Admin
 */
class EventsController extends CrudController
{
    use ListOperation;
    //use CreateOperation;
    //use UpdateOperation;
    //use DeleteOperation;
    use ShowOperation;
    use FetchOperation;

    /**
     * @throws \Exception
     */
    public function setup()
    {
        $this->crud->setModel(Events::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/events');
        $this->crud->setEntityNameStrings(trans('admin.event'), trans('admin.events'));

        $user = Auth::guard('backpack')->user();
        $this->crud->addClause('where', 'company_id', '=', $user->id);
    }

    /**
     *
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name', // The db column name
            'label' => trans('admin.title'), // Table column heading
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            // show both text and email values in one column
            // this column is here to demo and test the custom searchLogic functionality
            'name'          => 'model_function',
            'label'         => trans('admin.customer'), // Table column heading
            'type'          => 'model_function',
            'function_name' => 'getCustomerFullName', // the method in your Model
            'wrapper'   => [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('customers/'.$entry->customer_id.'/show');
                },
            ],
        ]);

        $this->crud->addColumn([   // DateTime
            'name'              => 'created_at',
            'label'             => trans('admin.time'),
            'type'              => 'datetime',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            //'tab'               => 'Time and space',
        ]);

        $this->crud->enableExportButtons();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(EventsRequest::class);
        $this->crud->setOperationSetting('contentClass', 'col-md-12');

        CRUD::addField([
            'name' => 'name',
            'label' => trans('admin.title'),
        ]);

        CRUD::addField(
            [   // 1-n relationship
                'label'     => trans('admin.customer'), // Table column heading
                'type'      => 'select2',
                'name'      => 'customer_id', // the column that contains the ID of that connected entity;
                'entity'    => 'customer', // the method that defines the relationship in your Model
                'attribute' => 'email', // foreign key attribute that is shown to user
                'model'     => "App\Models\Customers", // foreign key model
                /*'wrapper'   => [
                    'href' => function ($crud, $column, $entry, $related_key) {
                        return backpack_url('customers/'.$related_key.'/show');
                    },
                ],*/
            ]
        );
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        $this->crud->setOperationSetting('contentClass', 'col-md-12');
    }
}
