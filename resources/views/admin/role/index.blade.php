@extends('layouts.backend.master')

@section('title', 'Roles')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 col-lg-8">
                <x-card.card-action title="List Roles" url="{{ route('admin.roles.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th class="col-1">#</th>
                                <th>Name</th>
                                <th>Permission</th>
                                <th class="col-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $i => $role)
                                <tr>
                                    <td>{{ $i + $roles->firstItem() }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    </td>
                                    <td>
                                        <x-button.button-edit id="{{ $role->id }}" title="Edit" />
                                        <x-modal.modal title="Edit Role" id="{{ $role->id }}">
                                            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-form.input type="text" title="Role Name" name="name"
                                                    placeholder="Input role name" value="{{ $role->name }}" />
                                                <x-form.select-group title="Permissions">
                                                    @foreach ($permissions as $permission)
                                                        <label class="form-selectgroup-item">
                                                            <input type="checkbox" name="permissions[]"
                                                                value="{{ $permission->id }}"
                                                                class="form-selectgroup-input" multiple
                                                                {{ $role->permissions()->find($permission->id) ? 'checked' : '' }}>
                                                            <span class="form-selectgroup-label">
                                                                {{ $permission->name }}
                                                            </span>
                                                        </label>
                                                    @endforeach
                                                </x-form.select-group>
                                                <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                                            </form>
                                        </x-modal.modal>
                                        <x-button.button-delete id="{{ $role->id }}"
                                            url="{{ route('admin.roles.destroy', $role->id) }}" title="Delete" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table.table-responsive>
                    <div class="d-flex justify-content-end mt-1">{{ $roles->links() }}</div>
                </x-card.card-action>
            </div>
            <div class="col-12 col-lg-4">
                <x-card.card title="Create New Role">
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf
                        <x-form.input type="text" title="Role Name" name="name" placeholder="Input role name" value="" />
                        <x-form.select-group title="Permissions">
                            @foreach ($permissions as $permission)
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="permissions[]" value="{{ $permission->id }}"
                                        class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">
                                        {{ $permission->name }}
                                    </span>
                                </label>
                            @endforeach
                        </x-form.select-group>
                        <x-button.button-save icon="save" title="Save" class="btn btn-primary" />
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
