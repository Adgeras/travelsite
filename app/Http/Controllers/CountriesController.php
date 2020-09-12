<?php

namespace App\Http\Controllers;

use App\Countries;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('countries.index', ['countries' => Countries::orderBy('title')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new Countries();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $country->fill($request->all());
        $country->save();
        return redirect()->route('countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Countries  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Countries $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Countries  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Countries $country)
    {
        return view('countries.edit', ['countries' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Countries  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Countries $country)
    {
        $country->fill($request->all());
        $country->save();
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countries $country)
    {
        if (count($country->towns)) {
            return back()->withErrors(['error' => ['Can\'t delete country with cities assigned, please unassign cities first!']]);
        }
        $country->delete();
        return redirect()->route('countries.index');
    }
}
