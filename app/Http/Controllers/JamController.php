<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use Illuminate\Http\Request;

class JamController extends Controller
{
    public function index()
    {
        $jam = Jam::orderBy('id','desc')->paginate(5);
        return view('jams.index', compact('jam'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('jams.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'sesi_jam' => 'required',
        ]);
        
        Jam::create($request->post());

        return redirect()->route('jams.index')->with('success','Jam telah ditambahkan.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Jam $jam)
    {
        return view('jams.show',compact('jam'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Jam $jam)
    {
        return view('jams.edit',compact('jam'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Jam $jam)
    {
        $request->validate([
            'sesi_jam' => 'required',
        ]);
        
        $jam->fill($request->post())->save();

        return redirect()->route('jams.index')->with('success','Jam telah diupdate');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Jam $jam)
    {
        $jam->delete();
        return redirect()->route('jams.index')->with('success','Jam telah dihapus');
    }
}
