<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Http\Requests\StorePlaces;
use Datatables;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            return datatables()
                ->eloquent(Place::query())
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/institucion-editar/' . $row->id . '" data-id="' . $row->id . '" class="btn btn-warning">' .
                        "<i class='fa fa-edit'></i>"
                        . '</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('places.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlaces $request)
    {
        $i = new Place();
        $i->name = $request->name;
        $i->save();
        return redirect()->route('instituciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $i = Place::find($id);
        return view('places.edit', compact('i', 'id'));
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
        $i = Place::find($id);
        $i->name = $request->name;
        $i->save();
        return redirect()->route('instituciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { }
}
