<?php

namespace App\Http\Controllers;

use App\Models\AboutStat;
use Illuminate\Http\Request;

class AboutStatController extends Controller
{
    public function index()
    {
        return response()->json(AboutStat::all());
    }

    public function update(Request $request, $id)
    {
        $stat = AboutStat::findOrFail($id);
        $stat->update($request->validate([
            'value' => 'required|integer'
        ]));
        return response()->json($stat);
    }
}
