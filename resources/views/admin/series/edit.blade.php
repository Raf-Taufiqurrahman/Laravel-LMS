@extends('layouts.backend.master')

@section('title', 'Edit Series')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Create New Series">
                    <form action="{{ route('admin.series.update', $series->slug) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-form.input type="text" title="Series Name" name="name" value="{{ $series->name }}"
                            placeholder="Input series name" />
                        <div class="row">
                            <div class="col-6">
                                <x-form.select-advanced title="Tags" name="tags[]">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ $series->tags()->find($tag->id) ? 'selected' : '' }}>
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                </x-form.select-advanced>
                            </div>
                            <div class="col-6">
                                <x-form.input type="number" title="Series Price" name="price" value="{{ $series->price }}"
                                    placeholder="Input series price" />
                            </div>
                        </div>
                        <img src="{{ $series->cover }}" alt="{{ $series->name }}" class="img-fluid mb-3 " width="20%" />
                        <x-form.input type="file" title="Series cover" name="cover" value="{{ $series->cover }}"
                            placeholder="" />
                        <x-form.textarea title="Series Description" name="description" placeholder="">
                            {{ $series->description }}
                        </x-form.textarea>
                        <div class="row">
                            <div class="col-6">
                                <x-form.select-group title="Series Level">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Beginner" class="form-selectgroup-input"
                                            {{ $series->level == 'Beginner' ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">
                                            Beginner
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Intermediate" class="form-selectgroup-input"
                                            {{ $series->level == 'Intermediate' ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">
                                            Intermediate
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Advanced" class="form-selectgroup-input"
                                            {{ $series->level == 'Advanced' ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">
                                            Advanced
                                        </span>
                                    </label>
                                </x-form.select-group>
                            </div>
                            <div class="col-6">
                                <x-form.checkbox title="Series Status">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="status" value="0"
                                            {{ $series->status == '0' ? 'checked' : '' }}>
                                        <span class="form-check-label">Developed</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="status" value="1"
                                            {{ $series->status == '1' ? 'checked' : '' }}>
                                        <span class="form-check-label">Completed</span>
                                    </label>
                                </x-form.checkbox>
                            </div>
                        </div>
                        <x-button.button-save title="Save" icon="save" class="btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.series.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
