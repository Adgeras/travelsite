<?php

namespace App\Http\Controllers;

use App\Towns;
use Illuminate\Http\Request;

class TownsController extends Controller
{
    public function index()
    {
        return view('towns.index', ['towns' => Towns::orderBy('title')->get()]);
    }
    // ATTENTION :: we need countries to be able to assign them
    public function create()
    {
        $countries = \App\Countries::orderBy('title')->get();
        return view('towns.create', ['countries' => $countries]);
    }
    public function store(Request $request)
    {
        $town = new Towns();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $town->fill($request->all());
        $town->save();
        return redirect()->route('towns.index');
    }
    public function show(Towns $town)
    {
        //
    }
    // ATTENTION :: we need countries to be able to assign them
    public function edit(Towns $town)
    {
        $countries = \App\Countries::orderBy('title')->get();
        return view('towns.edit', ['towns' => $town, 'countries' => $countries]);
    }
    public function update(Request $request, Towns $town)
    {
        $town->fill($request->all());
        $town->save();
        return redirect()->route('towns.index');
    }
    public function destroy(Towns $town)
    {
        $town->delete();
        return redirect()->route('towns.index');
    }
}
