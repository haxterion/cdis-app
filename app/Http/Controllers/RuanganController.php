<?php

namespace App\Http\Controllers;

use App\Exports\RuanganExport;
use App\Imports\RuanganImport;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::orderBy('id','ASC')->get();
        return view('ruangans.index', compact('ruangan'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('ruangans.create');
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
            'nama_ruangan' => 'required',
        ]);
        
        Ruangan::create($request->post());

        return redirect()->route('ruangans.index')->with('success','Ruangan telah ditambahkan.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Ruangan $ruangan)
    {
        return view('ruangans.show',compact('ruangan'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Ruangan $ruangan)
    {
        return view('ruangans.edit',compact('ruangan'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'nama_ruangan' => 'required',
        ]);
        
        $ruangan->fill($request->post())->save();

        return redirect()->route('ruangans.index')->with('success','Ruangan telah diupdate');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect()->route('ruangans.index')->with('success','Ruangan telah dihapus');
    }

    public function fileImport(Request $request)
    {
        Excel::import(new RuanganImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new RuanganExport, 'users-collection.xlsx');
    }
    public function deleteAllData()
    {
        DB::table('ruangans')->delete();
        Alert::success('Congrats', 'Data berhasil dihapus');
        return back();
    }   
}
