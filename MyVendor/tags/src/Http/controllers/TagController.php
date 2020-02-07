<?php

namespace MyVendor\tags\Http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MyVendor\tags\Models\Tag;

class TagController extends Controller
{
    function list() {
        $tags = Tag::all();
        return view("tags::list", ['tags' => $tags]);
    }

    public function createInit()
    {
        return view("tags::add");
    }

    public function create(Request $request)
    {
        Tag::create($request->all());
        return redirect(route('tagList'))->with(['message' => 'Tag created successfully.']);
    }
}
