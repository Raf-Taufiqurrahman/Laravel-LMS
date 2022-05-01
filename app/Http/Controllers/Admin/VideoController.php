<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function create($slug)
    {
        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // return view with series
        return view('admin.video.create', compact('series'));
    }

    public function store(Request $request, $slug)
    {
        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // create new video by series
        $series->videos()->create([
            'name' => $request->name,
            'video_code' => $request->video_code,
            'episode' => $request->episode,
            'duration' => $request->duration,
            'intro' => $request->intro ? 1 : 0
        ]);

        // return redirect with toastr
        return redirect(route('admin.series.show', $series->slug))->with('toast_success', 'Video created successfully ');
    }

    public function edit($slug, $video_code)
    {
        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // get video by video_code
        $video = Video::where('video_code', $video_code)->first();

        // return view with series and video
        return view('admin.video.edit', compact('series', 'video'));
    }

    public function update(Request $request, $slug, $video_code)
    {
        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // get video by video_code
        $video = Video::where('video_code', $video_code)->first();

        $video->update([
            'name' => $request->name,
            'video_code' => $request->video_code,
            'episode' => $request->episode,
            'duration' => $request->duration,
            'intro' => $request->intro ? 1 : 0
        ]);

        // return view with series and video
        return redirect(route('admin.series.show', $series->slug))->with('toast_success', 'Video updated successfully ');
    }

    public function destroy(video $video)
    {
        // delete video by id
        $video->delete();

        // redirect back with toastr
        return back()->with('toast_success', 'Video deleted successfully');
    }
}
