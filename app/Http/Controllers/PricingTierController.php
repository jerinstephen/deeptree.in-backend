<?php

namespace App\Http\Controllers;

use App\Models\PricingTier;
use Illuminate\Http\Request;

class PricingTierController extends Controller
{
    public function index()
    {
        return response()->json(PricingTier::all());
    }

    public function store(Request $request)
    {
        $tier = PricingTier::create($request->all());
        return response()->json($tier, 201);
    }

    public function update(Request $request, $id)
    {
        $tier = PricingTier::findOrFail($id);
        $tier->update($request->all());
        return response()->json($tier);
    }

    public function destroy($id)
    {
        PricingTier::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
