<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompaniesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Auth;

/**
 * Class CompaniesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CompaniesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Companies::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/companies');
        CRUD::setEntityNameStrings(trans('admin.company'), trans('admin.companies'));

        $user = Auth::guard('backpack')->user();
        $this->crud->addClause('where', 'company_id', '=', $user->id);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

        $this->crud->addColumn(
            [
                'name' => 'name', // The db column name
                'label' => trans('admin.title'), // Table column heading
                'type' => 'text'
            ]
        );
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CompaniesRequest::class);

        //CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */

        CRUD::addField(
            [
                'name' => 'name',
                'label' => trans('admin.title'),
                'type' => 'text',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-7'
                ],
            ]
        );

        CRUD::addField(
            [    // SELECT
                'label'             => trans('admin.list'),
                'type'              => 'select2_multiple',
                'name'              => 'lists',
                'entity'            => 'lists',
                'attribute'         => 'name',
                'model'             => "App\Models\Lists",
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-12'
                ],
            ]
        );

        CRUD::addField(
            [
                'name' => 'is_activated',
                'label' => trans('admin.start'),
                'type' => 'checkbox',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-7'
                ],
            ]
        );
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
