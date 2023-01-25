<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class AbsensiMemberController extends Controller
{
    public function index()
    {
        return view('absensimember.index');
    }

    public function autocomplete(Request $request)
    {
        $data = Tutor::select("nama_tutor as value", "id")
            ->where('nama_tutor', 'LIKE', '%' . $request->get('search') . '%')
            ->get();

        return response()->json($data);
    }
}
