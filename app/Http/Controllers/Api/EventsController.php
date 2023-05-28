<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EventsRequest;
use App\Http\Resources\Event;
use App\Models\Customers;
use App\Models\Events;
use App\Models\EventTypes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventsRequest $request)
    {
        $user = Auth::user();

        if ($request->validated()) {

            $email = $request->customer_properties['email'] ?? false;
            $firstName = $request->customer_properties['first_name'] ?? false;
            $lastName = $request->customer_properties['last_name'] ?? false;
            /**
             * @var Customers $customer
             */
            $customer = Customers::firstOrCreate(['email' => $email]);
            $customer->first_name = $customer->first_name ? $customer->first_name : $firstName;
            $customer->last_name = $customer->last_name ? $customer->last_name : $lastName;
            $customer->save();
            $eventType = EventTypes::firstOrCreate(['name' => $request->event]);
            $event = new Events();
            $event->name = $request->event;
            $event->event_type_id = $eventType->id;
            $event->company_id = $customer->company_id;
            $event->customer_id = $customer->id;
            $event->data = json_encode($request->properties);
            $event->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
