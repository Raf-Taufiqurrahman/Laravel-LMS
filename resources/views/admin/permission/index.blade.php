@extends('layouts.backend.master')

@section('title', 'Permissions')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 col-lg-8">
                <x-card.card-action title="List Permissions" url="{{ route('admin.permissions.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th class="col-1">#</th>
                                <th>Name</th>
                                <th class="col-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $i => $permission)
                                <tr>
                                    <td>{{ $i + $permissions->firstItem() }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <x-button.button-edit id="{{ $permission->id }}" title="Edit" />
                                        <x-modal.modal title="Edit Permission" id="{{ $permission->id }}">
                                            <form action="{{ route('admin.permissions.update', $permission->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-form.input type="text" title="Permission Name" name="name"
                                                    placeholder="Input permission name" value="{{ $permission->name }}" />
                                                <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                                            </form>
                                        </x-modal.modal>
                                        <x-button.button-delete id="{{ $permission->id }}"
                                            url="{{ route('admin.permissions.destroy', $permission->id) }}"
                                            title="Delete" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table.table-responsive>
                    <div class="d-flex justify-content-end mt-1">{{ $permissions->links() }}</div>
                </x-card.card-action>
            </div>
            <div class="col-12 col-lg-4">
                <x-card.card title="Create New Permission">
                    <form action="{{ route('admin.permissions.store') }}" method="POST">
                        @csrf
                        <x-form.input type="text" title="Permission Name" name="name" placeholder="Input permission name"
                            value="" />
                        <x-button.button-save icon="save" title="Save" class="btn btn-primary" />
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
