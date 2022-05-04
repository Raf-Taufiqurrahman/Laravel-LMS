@extends('layouts.backend.master')

@section('title', 'Create Series')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Create New Series">
                    <form action="{{ route('admin.series.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-form.input type="text" title="Series Name" name="name" value=""
                            placeholder="Input series name" />
                        <div class="row">
                            <div class="col-6">
                                <x-form.select-advanced title="Tags" name="tags[]">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </x-form.select-advanced>
                            </div>
                            <div class="col-6">
                                <x-form.input type="number" title="Series Price" name="price" value=""
                                    placeholder="Input series price" />
                            </div>
                        </div>
                        <x-form.input type="file" title="Series cover" name="cover" value="" placeholder="" />
                        <x-form.textarea title="Series Description" name="description" value=""
                            placeholder="Input series description" />
                        <div class="row">
                            <div class="col-6">
                                <x-form.select-group title="Series Level">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Beginner" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">
                                            Beginner
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Intermediate"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">
                                            Intermediate
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Advanced" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">
                                            Advanced
                                        </span>
                                    </label>
                                </x-form.select-group>
                            </div>
                            <div class="col-6">
                                <x-form.checkbox title="Series Status">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="status" value="0">
                                        <span class="form-check-label">Developed</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="status" value="1">
                                        <span class="form-check-label">Completed</span>
                                    </label>
                                </x-form.checkbox>
                            </div>
                        </div>
                        <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.series.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
