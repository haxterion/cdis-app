<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class CariMemberController extends Controller
{
    public function index()
    {
        return view('cari.index');
    }

    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Member::where('nama', 'LIKE', '%' . $query . '%')->get();
        return response()->json($filterResult);
    }
}
