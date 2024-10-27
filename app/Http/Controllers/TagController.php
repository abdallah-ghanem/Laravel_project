<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return Tag::all();
}

public function store(Request $request)
{
    $request->validate(['name' => 'required|unique:tags']);
    return Tag::create(['name' => $request->name]);
}

public function update(Request $request, Tag $tag)
{
    $request->validate(['name' => 'required|unique:tags,name,' . $tag->id]);
    $tag->update(['name' => $request->name]);
    return $tag;
}

public function destroy(Tag $tag)
{
    $tag->delete();
    return response()->json(null, 204);
}

}
