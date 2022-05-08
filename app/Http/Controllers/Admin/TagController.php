<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tag;
use App\Traits\HasColor;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use HasColor;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // tags with search and paginate
        $tags = Tag::search('name')->paginate(10);

        // return view
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request
        $request->validate([
            'name' => 'required|unique:tags',
        ]);

        // call method randomColor from trait HasColor
        $colorData = $this->randomColor();

        // create new tag
        Tag::create([
            'name' => $request->name,
            'color' => $colorData->random()
        ]);

        // return back with toastr
        return back()->with('toast_success', 'Tag created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tag $tag)
    {
        // validate the request
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id,
        ]);

        // update tag by id
        $tag->update([
            'name' => $request->name
        ]);

        // return redirect back
        return back()->with('toast_success', 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        // delete tag by id
        $tag->delete();

        // return back with toastr
        return back()->with('toast_success', 'Tag deleted successfully');
    }
}
