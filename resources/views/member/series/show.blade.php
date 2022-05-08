@extends('layouts.backend.master')

@section('title')
    {{ $series->name }}
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="List Videos - {{ $series->name }}">
                    <div class="list-group list-group-flush">
                        @foreach ($videos as $video)
                            <a href="{{ route('member.series.video', [$series->slug, $video->episode]) }}"
                                class="list-group-item list-group-item-action" aria-current="true">
                                Eps - {{ $video->episode }} {{ $video->name }}
                                <span class="badge bg-{{ $video->intro == 1 ? 'azure' : 'red' }} ml-1">
                                    {{ $video->intro == 1 ? 'free' : 'pro' }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
