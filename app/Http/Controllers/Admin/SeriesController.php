<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Video;
use App\Models\Series;
use App\Traits\HasCover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SeriesStoreRequest;
use App\Http\Requests\SeriesUpdateRequest;

class SeriesController extends Controller
{
    use HasCover;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // series with search and paginate
        $series = Series::with('tags')->search('name')->paginate(10);

        // return view with series
        return view('admin.series.index', compact('series'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all tags
        $tags = Tag::get();

        // return view with tags
        return view('admin.series.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeriesStoreRequest $request)
    {
        // call method uploadCover from trait hasCover
        $cover = $this->uploadCover($request);

        // create new series
        $series = Auth::user()->series()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'level' => $request->level,
            'status' => $request->status,
            'cover' => $cover->hashName(),
        ]);

        // create series with tags by request
        $series->tags()->sync($request->tags);

        // redirect to series inedex with toastr
        return redirect(route('admin.series.index'))->with('toast_success', 'Series created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $series = Series::where('slug', $slug)->first();

        $videos = Video::where('series_id', $series->id)->orderBy('episode')->paginate(10);

        return view('admin.series.show', compact('series', 'videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // get all tags
        $tags = Tag::get();

        // return view with series and tags
        return view('admin.series.edit', compact('series', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(SeriesUpdateRequest $request, $slug)
    {
        // call method uploadCover from trait hasCover
        $cover = $this->uploadCover($request);

        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // check if user upload new cover
        if($request->file('cover')){
            // delete old cover
            Storage::disk('local')->delete('public/covers/'. basename($series->cover));

            // update new series with cover
            $series->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'level' => $request->level,
                'status' => $request->status,
                'cover' => $cover->hashName(),
            ]);
        }

        // update new series without cover
        $series->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'level' => $request->level,
            'status' => $request->status,
        ]);

        // update series with tags by request
        $series->tags()->sync($request->tags);

        // redirect to series inedex with toastr
        return redirect(route('admin.series.index'))->with('toast_success', 'Series updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        // delete series with relationship tags
        $series->tags()->detach();

        // delete series by id
        $series->delete();

        // delete series cover by id
        Storage::disk('local')->delete('public/covers/'. basename($series->cover));

        // return redirect back with toastr
        return back()->with('toast_success', 'Series deleted successfully');
    }
}
