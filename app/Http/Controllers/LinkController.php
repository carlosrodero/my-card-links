<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return Link::where("user_id", auth()->id())->get();
    } 

    public function store(Request $request)
    {
        $link = new Link();
        $link->label = $request->label;
        $link->url = $request->url;
        $link->user_id = auth()->id();
        $link->save();

        return $link;
    }

    public function update(Request $request, $id)
    {
        $link = Link::find($id);
        $link->label = $request->label;
        $link->url = $request->url;
        $link->save();

        return $link;
    }

    public function destroy($id)
    {
        $link = Link::find($id);
        $link->delete();
    }
}
