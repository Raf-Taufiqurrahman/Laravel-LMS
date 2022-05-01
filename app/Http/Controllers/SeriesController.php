<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Video;
use App\Models\Series;
use App\Traits\HasSeries;
use App\Models\Transaction;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    use HasSeries;

    public function index()
    {
        // get all series
        $series = Series::with('videos')->latest()->get();

        // return to landing page
        return view('landing.series.index', compact('series'));
    }

    public function show($slug)
    {
        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // get videos by series
        $videos = Video::where('series_id', $series->id)->get();

        // call method members from trait HasSeries
        $members = $this->members($series);

        // call method userSeries from trait HasSeries
        $userSeries = $this->userSeries($series);

        return view('landing.series.show', compact('series','videos', 'members', 'userSeries'));
    }

    public function video($slug, $episode)
    {
        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // get video all video by series
        $video = Video::where('series_id', $series->id)->where('episode', $episode)->first();

        // call method userSeries from trait HasSeries
        $userSeries = $this->userSeries($series);

        // define variable $videos
        $videos = '';

        // user can watch full video if user have this series or user still can watch video only intro video
        if($userSeries->count() > 0 || $video->intro == 1){
            // if true, get all video by series
            $videos = Video::where('series_id', $series->id)->orderBy('episode')->paginate(10);
        }else{
            // if false, get only intro video
            return back()->with('toast_error', 'You must buy this series first');
        }
        // return to view
        return view('landing.series.video', compact('series','video','videos','userSeries'));
    }
}
