<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use App\Models\Kloter;
use App\Models\Member;
use App\Models\Ruangan;
use App\Models\Subject;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class KloterController extends Controller
{
    public function home()
    {
       $kloter = Kloter::count();
       $member = Member::count();
       $jam = Jam::count();
       $subject = Subject::count();
       $ruangan = Ruangan::count();
       $tutor = Tutor::count();

       return view('home', compact('kloter','member','jam','subject','ruangan','tutor'));
    }
    public function index()
    {
        $kloter = Kloter::orderBy('id', 'desc')->get();
        $tm = Kloter::get();
        $ct = array($tm);
        $tc = count($ct);
        return view('kloters.index', compact('kloter', 'tm'));
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
        $subject = Subject::all();
        $ruangan = Ruangan::all();
        $tutor = Tutor::all();
        return view('kloters.create', compact('jam', 'ruangan', 'tutor', 'member','subject'));
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
            'list_member' => 'required',
            'list_subject' => 'required'
        ]);
        $lm = json_encode($request->list_member);
        $ls = json_encode($request->list_subject);
        $kloter = new Kloter;
        $kloter->nama = $request->nama;
        $kloter->id_jam = $request->id_jam;
        $kloter->id_ruangan = $request->id_ruangan;
        $kloter->id_tutor = $request->id_tutor;
        $kloter->list_member = $lm;
        $kloter->list_subject = $ls;
        $kloter->save();

        return redirect()->route('kloters.index')->with('success', 'Kloter telah ditambahkan.');
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
        $ls = json_decode($kloter->list_subject, true);
        $subject = Subject::whereIn('id', $ls)->get();
        $sl = json_decode($subject);
        return view('kloters.show', compact('kloter', 'member', 'ml','subject','sl'));
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
        $lm = json_decode($kloter->list_member, true);
        $ll = implode(' ', $lm);
        $member = Member::all();
        $mem = Member::whereIn('id', $lm)->get();
        $dc = json_decode($member);
        $ls = json_decode($kloter->list_subject, true);
        $sl = implode(' ', $ls);
        $subject = Subject::all();
        $sub = Subject::whereIn('id', $ls)->get();
        $sc = json_decode($subject);

        // dd($lm);

        return view('kloters.edit', compact('ls','sl','subject','sub','sc','kloter', 'jam', 'ruangan', 'tutor', 'member', 'dc', 'lm', 'mem'));
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
            'list_member' => 'required',
            'list_subject' => 'required',
            'id_tutor' => 'required',
        ]);
        $req = json_decode($request);
        // dd($kloter->id);
        $ll = json_encode($request->list_member);
        $ls = json_encode($request->list_subject);
        $kloter = Kloter::find($kloter->id);
        $kloter->nama = $request->nama;
        $kloter->id_jam = $request->id_jam;
        $kloter->id_ruangan = $request->id_ruangan;
        $kloter->id_tutor = $request->id_tutor;
        $kloter->list_member = $ll;
        $kloter->list_subject = $ls;
        $kloter->save();

        return redirect()->route('kloters.index')->with('success', 'Kloter telah diupdate');
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
        return redirect()->route('kloters.index')->with('success', 'Kloter telah dihapus');
    }
}
