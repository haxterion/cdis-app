<?php

namespace App\Http\Controllers;

use App\Exports\TutorExport;
use App\Imports\TutorImport;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TutorController extends Controller
{
    public function index()
    {
        $tutor = Tutor::orderBy('id','ASC')->get();
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

    public function fileImport(Request $request)
    {
        Excel::import(new TutorImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new TutorExport, 'users-collection.xlsx');
    }
    public function deleteAllData()
    {
        DB::table('tutors')->delete();
        Alert::success('Congrats', 'Data berhasil dihapus');
        return back();
    } 
}
