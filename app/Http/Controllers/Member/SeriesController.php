<?php

namespace App\Http\Controllers\Member;

use App\Models\Video;
use App\Models\Series;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use App\Traits\HasSeries;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    use HasSeries;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get transaction by user id
        $transaction = Transaction::where('user_id', Auth::id())->verified()->get();

        // if transaction is not empty
        if($transaction->count() > 0){
            // get all userSeries, call from method userSeries, trait hasSeries
            $series = $this->userSeries()->get();
            // return view
            return view('member.series.index', compact('series'));
        }else{
            // return back with toastr
            return back()->with('toast_error', 'You have not purchased any series yet!');
        }
    }

    public function video($slug, $episode)
    {
        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // get video all video by series
        $video = Video::where('series_id', $series->id)->where('episode', $episode)->first();

        // call method userSeries from trait hasSeries
        $seriesPurchased = $this->userSeries()->where('series_id', $series->id)->get();

        // check if user purchased this series
        if($seriesPurchased->count() > 0){
            // get videos by series
            $videos = Video::where('series_id', $series->id)->orderBy('episode')->paginate(10);
            // return to view
            return view('member.series.video', compact('series','video','videos'));
        }else{
            // return back with toastr
            return back()->with('toast_error', 'You must purchase this series first');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // get series by slug
        $series = Series::where('slug', $slug)->first();

        // call method userSeries from trait hasSeries
        $seriesPurchased = $this->userSeries()->where('series_id', $series->id)->get();

        // check if user purchased this series
        if($seriesPurchased->count() > 0){
            // get videos by series
            $videos = Video::where('series_id', $series->id)->get();
            // return to view
            return view('member.series.show', compact('series','videos'));
        }else{
            // return back with toastr
            return back()->with('toast_error', 'You must purchase this series first');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
