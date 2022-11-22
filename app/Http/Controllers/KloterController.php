<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use App\Models\Kloter;
use App\Models\Member;
use App\Models\Ruangan;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KloterController extends Controller
{
    public function index()
    {
        $kloter = Kloter::orderBy('id','desc')->paginate(5);
        return view('kloters.index', compact('kloter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jam = Jam::all();
        $member = Member::all();
        $ruangan = Ruangan::all();
        $tutor = Tutor::all();
        return view('kloters.create', compact('jam','ruangan', 'tutor', 'member'));
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
            'nama' => 'required',
            'id_jam' => 'required',
            'id_ruangan' => 'required',
            'id_tutor' => 'required',
            'list_member' => 'required'
        ]);
        $lm = json_encode($request->list_member);
        $kloter = new Kloter;
        $kloter->nama = $request->nama;
        $kloter->id_jam = $request->id_jam;
        $kloter->id_ruangan = $request->id_ruangan;
        $kloter->id_tutor = $request->id_tutor;
        $kloter->list_member = $lm;
        $kloter->save();
        
        return redirect()->route('kloters.index')->with('success','Kloter telah ditambahkan.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Kloter $kloter)
    {
        $lm = json_decode($kloter->list_member, true);
        $member = Member::whereIn('id', $lm)->get();
        $ml = json_decode($member);
        return view('kloters.show',compact('kloter','member','ml'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Kloter $kloter)
    {
        $jam = Jam::all();
        $ruangan = Ruangan::all();
        $tutor = Tutor::all();
        return view('kloters.edit',compact('kloter', 'jam', 'ruangan', 'tutor'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Kloter $kloter)
    {
        $request->validate([
            'nama' => 'required',
            'id_jam' => 'required',
            'id_ruangan' => 'required',
            'id_tutor' => 'required',
        ]);
        
        $kloter->fill($request->post())->save();

        return redirect()->route('kloters.index')->with('success','Kloter telah diupdate');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Kloter $kloter)
    {
        $kloter->delete();
        return redirect()->route('kloters.index')->with('success','Kloter telah dihapus');
    }
}
