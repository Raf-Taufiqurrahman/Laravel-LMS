<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Series $series)
    {
        // get all series
        $series = Series::with('videos')->latest()->take(6)->get();

        // return to landing page
        return view('landing.index', compact('series'));
    }
}
