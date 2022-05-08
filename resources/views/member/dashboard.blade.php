@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <x-utilities.widget title="My Series" subTitle="{{ $series }}" class="bg-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-playlist" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="14" cy="17" r="3"></circle>
                        <path d="M17 17v-13h4"></path>
                        <path d="M13 5h-10"></path>
                        <line x1="3" y1="9" x2="13" y2="9"></line>
                        <path d="M9 13h-6"></path>
                    </svg>
                </x-utilities.widget>
            </div>
        </div>
    </div>
@endsection
