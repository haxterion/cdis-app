<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function index()
    {
        $tutor = Tutor::orderBy('id','desc')->paginate(5);
        return view('tutors.index', compact('tutor'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('tutors.create');
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
            'nama_tutor' => 'required',
        ]);
        
        Tutor::create($request->post());

        return redirect()->route('tutors.index')->with('success','Tutor telah ditambahkan.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Tutor $tutor)
    {
        return view('tutors.show',compact('tutor'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Tutor $tutor)
    {
        return view('tutors.edit',compact('tutor'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Tutor $tutor)
    {
        $request->validate([
            'nama_tutor' => 'required',
        ]);
        
        $tutor->fill($request->post())->save();

        return redirect()->route('tutors.index')->with('success','Tutor telah diupdate');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Tutor $tutor)
    {
        $tutor->delete();
        return redirect()->route('tutors.index')->with('success','Tutor telah dihapus');
    }
}
