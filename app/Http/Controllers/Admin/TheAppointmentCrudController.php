<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TheAppointmentRequest as StoreRequest;
use App\Http\Requests\TheAppointmentRequest as UpdateRequest;
use App\Models\The_patient;
use App\Models\Clinic;
/**
 * Class TheAppointmentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TheAppointmentCrudController extends CrudController
{
    public function setup()
    { 


        //FIXME:  get the clicnics from clinic s table ---------------------------- 

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        // $this->crud->setModel("App\Models\Example");
        // $this->crud->setRoute("admin/app");
            // OR $this->crud->setRouteName("admin.example");
        // $this->crud->setEntityNameStrings("example", "examples");


        $this->crud->setModel('App\Models\TheAppointment');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/app');
        $this->crud->setEntityNameStrings('Appointment', 'Appointments');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
    

        // $this->crud->setFromDb();
        $feilds = [
                $patientId = [  
                'name' => 'patient_id',
                'label' => 'Patient Number',
                'type' => 'text',
                'attributes' => [
                'id' => 'number'
                ], 
            ],
                $patientName = [  
                'name' => 'name',
                'label' => 'Patient Name',
                'type' => 'text',
                'attributes' => [
                    'id' => 'name'
                    ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
                ]
            ],
  
                $patientMobile = [  
                'name' => 'mobile',
                'label' => 'Mobile',
                'type' => 'text',
                'attributes' => [
                    'id' => 'mobile'
                    ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-4'
                    ]
                ],
                
                $patientGender = [  
                'name' => 'gender',
                'label' => 'Gender',
                'type' => 'radio',
                'options'  => [ 
                    "M"   => "M",
                    "F" => "F"
                    ],
                    'attributes' => [
                    'id' => 'gender'
                    ],
                    'wrapperAttributes' => [
                    'class' => 'form-group col-md-4'
                    ]
                ],
                $status = [  
                'name' => 'a_status',
                'label' => 'Status',
                'type' => 'radio',
                'options'  => [ 
                    //FIXME: get these from DB
                    "Confirmed" => "Confirmed",
                    "To Confirm" => "To Confirm",
                    "Cancelled-patient treated" => "Cancelled-patient treated",
                    "Closed-visit skipped" => "Closed-visit skipped",
                    "Cancelled" => "Cancelled"
                 ],
                ],
                // $clinic = [  
                // 'label' => 'Clinic',
                // 'type' => 'select',
                // 'name' => 'a_clinic', // the db column for the foreign key
                // 'entity' => 'clinic', // the method that defines the relationship in your Model
                // 'attribute' => 'name', // foreign key attribute that is shown to user
                // 'model' => "App\Models\Clinic" // foreign key model
                // ],
                $clinic = [  
                'label' => 'Clinic',
                'type' => 'select',
                'name' => 'clinic_id', // the db column for the foreign key
                'entity' => 'clinic', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => "App\Models\Clinic" // foreign key model
                ],
                $appDate = [  
                'name' => 'a_date',
                'label' => 'Appointment Date :',
                'type' => 'date',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-4'
                    ]
                ],
                $startTime = [  
                'name' => 'a_start_time',
                'label' => 'Appointment Starts at:',
                'type' => 'time',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-4'
                    ]
                ],
                $endTime = [  
                'name' => 'a_end_time',
                'label' => 'Appointment Ends at:',
                'type' => 'time',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-4'
                    ]
                ],
                $cost = [  
                'name' => 'a_cost',
                'label' => 'Cost',
                'type' => 'text',
                ],
                $commnet = [  
                'name' => 'a_comments',
                'label' => 'Comments',
                'type' => 'textarea',
                ],
                //reset button
               
                ];
        
        $this->crud->addFields($feilds, 'update/create/both');
        //reset button
        $reset= [   // CustomHTML
                    'name' => 'reset',
                    'type' => 'custom_html',
                    'value' => '<button type="button" class="btn btn-primary" onclick="this.form.reset();">Reset</button>'
        ];
        $this->crud->addField($reset, 'create');

        // search filters -------------------------------------------------------------<3 <3
        //date
        $this->crud->addFilter([ 
            'type' => 'date_range',
            'name' => 'a_date',
            'label'=> 'From - To'
            ], 
            false, 
            function($value) { // if the filter is active
                $dates = json_decode($value);
                $this->crud->addClause('where', 'a_date', '>=', $dates->from);
                $this->crud->addClause('where', 'a_date', '<=', $dates->to);
            } );
        
        //patient number
        $this->crud->addFilter([ 
            'type' => 'text',
            'name' => 'patient_id',
            'label'=> 'Patient Number'
            ], 
            false, 
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'patient_id', $value); 
        } );
        //clinic
        $this->crud->addFilter([ 
            'type' => 'select2',
            'name' => 'a_clinic',
            'label'=> 'Clinic'
            ], 
            function() {
            return Clinic::pluck('name')->toArray();
            },
            function($value) { // if the filter is active
                $this->crud->addClause('where', 'a_clinic', $value); 
        } );
        
        // List columns
        
        $this->crud->setColumns(['patient_id','a_status','a_date','a_start_time','a_end_time']);
        $this->crud->addColumn([
            'label' => 'Clinic',
            'type' => 'select',
            'name' => 'clinic_id', // the db column for the foreign key
            'entity' => 'clinic', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Clinic"
            ]);
             




        // 	$this->crud->addField([
		// 	'name' => 'name',
		// 	'label' => "Tag name"
		// ]);
    	// 	$this->crud->addField([
		// 	'name' => 'slug',
		// 	'label' => "URL Segment (slug)"
		// ]);
        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '=', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();

        /**
         * 
         * custom view for edits
         * 
         */


            // $this->crud->setEditView('editApp');

    }

    // public function show(StoreRequest $request){

    // }
    public function store(StoreRequest $request)
    // your additional operations before save here
    // new user added to tha patients table
    {   
        if (!The_patient::where('number', '=', $request['patient_id'])->exists()) {
            
            $patient = new The_patient;
            $patient->number = $request['patient_id'];
            $patient->name = $request['name'];
            $patient->mobile = $request['mobile'];
            $patient->gender = $request['gender'];
            $patient->save();
        }
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }




}
