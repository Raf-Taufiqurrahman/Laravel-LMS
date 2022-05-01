@extends('layouts.backend.master')

@section('title', 'Edit Video')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Eps : {{ $video->episode }} {{ $video->name }} - {{ $series->name }}">
                    <form action="{{ route('admin.videos.update', [$series->slug, $video->video_code]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-form.input type="text" title="Video Name" name="name" value="{{ $video->name }}"
                            placeholder="Input video name" />
                        <x-form.input type="text" title="Video Code" name="video_code" value="{{ $video->video_code }}"
                            placeholder="Input video code" />
                        <div class="row">
                            <div class="col-6">
                                <x-form.input type="number" title="Video Episode" name="episode"
                                    value="{{ $video->episode }}" placeholder="input video episode" />
                            </div>
                            <div class="col-6">
                                <x-form.input type="time" title="Video Duration" name="duration"
                                    value="{{ $video->duration }}" placeholder="input video episode" />
                            </div>
                        </div>
                        <x-form.checkbox title="Intro">
                            <label class="form-check form-check-inline">
                                <input class="form-check-input @error('intro') is-invalid @enderror" type="checkbox"
                                    name="intro" value="1" {{ $video->intro ? 'checked' : '' }}>
                                <span class="form-check-label">Make this to intro video</span>
                            </label>
                        </x-form.checkbox>
                        <x-button.button-save title="Save" icon="save" />
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
