<?php

namespace App\Http\Controllers;

use App\Exports\SubjectExport;
use App\Imports\SubjectImport;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::orderBy('id','ASC')->get();
        return view('subjects.index', compact('subject'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('subjects.create');
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
            'nama_subject' => 'required',
        ]);
        
        Subject::create($request->post());

        return redirect()->route('subjects.index')->with('success','Subject telah ditambahkan.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Subject $subject)
    {
        return view('subjects.show',compact('subject'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Subject $subject)
    {
        return view('subjects.edit',compact('subject'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'nama_subject' => 'required',
        ]);
        
        $subject->fill($request->post())->save();

        return redirect()->route('subjects.index')->with('success','Subject telah diupdate');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success','Subject telah dihapus');
    }
    public function fileImport(Request $request)
    {
        Excel::import(new SubjectImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new SubjectExport, 'users-collection.xlsx');
    }
    public function deleteAllData()
    {
        DB::table('subjects')->delete();
        Alert::success('Congrats', 'Data berhasil dihapus');
        return back();
    }   
}
