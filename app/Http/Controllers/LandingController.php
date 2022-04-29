<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Series;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $series = Series::with('videos')->latest()->paginate(6);
        return view('landing.index', compact('series'));
    }
}
