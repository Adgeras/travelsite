<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->country_id) && $request->country_id !== 0)
            $customers = \App\Customers::where('country_id', $request->country_id)->orderBy('surname')->get();
        else
            $customers = \App\Customers::orderBy('surname')->get();
        $countries = \App\Countries::orderBy('title')->get();
        return view('customers.index', ['customers' => $customers, 'countries' => $countries]);
    }
    public function create()
    {
        $countries = \App\Countries::orderBy('title')->get();
        return view('customers.create', ['countries' => $countries]);
    }
    public function store(Request $request)
    {
        $customer = new Customers();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('customers.index');
    }
    public function show(Customers $customer)
    {
        //
    }
    public function edit(Customers $customer)
    {
        $countries = \App\Countries::orderBy('title')->get();
        return view('customers.edit', ['customers' => $customer, 'countries' => $countries]);
    }
    public function update(Request $request, Customers $customer)
    {
        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('customers.index');
    }
    public function destroy(Customers $customer, Request $request)
    {
        $customer->delete();
        return redirect()->route('customers.index', ['country_id' => $request->input('country_id')]);
    }
    public function travel($country_id)
    {
        
        $cuer = Customers::find($country_id);
        var_dump($cuer . 'ok'); 
        return view('customers.travel', ['customers' => $cuer]);
    }
}
