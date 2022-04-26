@extends('layouts.backend.master')

@section('title', 'Tags')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-8">
                <x-card-action title="List Tags" url="{{ route('admin.tags.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $i => $tag)
                                <tr>
                                    <td>{{ $i + $tags->firstItem() }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table.table-responsive>
                </x-card-action>
            </div>
            <div class="col-4">
                <x-card title="Create New Tag">
                    <form action="{{ route('admin.tags.store') }}" method="POST">
                        @csrf
                        <x-form.input title="Tag Name" name="name" placeholder="Input tag name" value="" />
                        <x-button icon="save" title="Save" />
                    </form>
                </x-card>
            </div>
        </div>
    </div>
@endsection
