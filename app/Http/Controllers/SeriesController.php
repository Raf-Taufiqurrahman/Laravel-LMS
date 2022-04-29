<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function show($slug)
    {
        $series = Series::where('slug', $slug)->firstOrFail();

        $videos = Video::where('series_id', $series->id)->get();

        return view('landing.series.show', compact('series','videos'));
    }

    public function video($slug, $episode)
    {
        $series = Series::where('slug', $slug)->first();

        $video = Video::where('series_id', $series->id)->where('episode', $episode)->first();

        $videos = Video::where('series_id', $series->id)->orderBy('episode')->paginate(10);

        return view('landing.series.video', compact('series','video','videos'));
    }
}
