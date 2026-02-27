<?php

namespace App\Http\Controllers;

use App\Models\SaaSPlatform;
use Illuminate\Http\Request;

class SaaSPlatformController extends Controller
{
    public function index()
    {
        return response()->json(SaaSPlatform::all());
    }

    public function store(Request $request)
    {
        $platform = SaaSPlatform::create($request->all());
        return response()->json($platform, 201);
    }

    public function update(Request $request, $id)
    {
        $platform = SaaSPlatform::findOrFail($id);
        $platform->update($request->all());
        return response()->json($platform);
    }

    public function destroy($id)
    {
        SaaSPlatform::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
