<?php

namespace App\Http\Controllers;

use App\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('Showing All bikes: ');
        $bikes = Bike::all();
        return view('bikes.view', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('User entered the creation screen');
        return view('bikes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $make=$request['make'];
        $model=$request['model'];
        $year=$request['year'];

        $bike=new Bike();

        $bike->make=$make;
        $bike->model=$model;
        $bike->year=$year;

        $bike->save();

        Log::info([$bike->make,$bike->model,$bike->year.  ' added to database']);

        return redirect('/bikes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        Log::info('Showing Bikes: '.$bike);
        return view('bikes.view', compact('bike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Log::info('Bike is being edited with the Id of: '.$id);
        $bike = Bike::find($id);
        return view('bikes.update', compact('bike'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
        ]);

        $bike = Bike::find($id);
        $bike->make = $request->get('make');
        $bike->model = $request->get('model');
        $bike->year = $request->get('year');
        $bike->save();
        
        Log::info('Bike has been updated with the Id of: '.$id);
        return redirect('/bikes')->with('success', 'The bike was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bike = Bike::find($id);
        $bike->delete();
        Log::info($bike.'has been deleted with the Id of'.$id);
        return redirect('/bikes')->with('success', 'The bike was deleted!');
    }
}
