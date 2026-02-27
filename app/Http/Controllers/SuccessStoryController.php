<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function index()
    {
        return response()->json(SuccessStory::all());
    }

    public function store(Request $request)
    {
        $story = SuccessStory::create($request->all());
        return response()->json($story, 201);
    }

    public function update(Request $request, $id)
    {
        $story = SuccessStory::findOrFail($id);
        $story->update($request->all());
        return response()->json($story);
    }

    public function destroy($id)
    {
        SuccessStory::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
