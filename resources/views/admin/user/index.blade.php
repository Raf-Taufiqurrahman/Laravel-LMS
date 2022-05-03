@extends('layouts.backend.master')

@section('title', 'Roles')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card-action title="List Users" url="{{ route('admin.users.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th class="col-1">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="col-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i => $user)
                                <tr>
                                    <td>{{ $i + $users->firstItem() }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="{{ $role->name == 'admin' ? 'text-red' : 'text-teal' }}">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <x-button.button-edit id="{{ $user->id }}" title="Edit" />
                                        <x-modal.modal title="Edit User" id="{{ $user->id }}">
                                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-form.input type="text" title="Username" name="name" placeholder=""
                                                    value="{{ $user->name }}" />
                                                <x-form.input type="text" title="Email" name="email" placeholder=""
                                                    value="{{ $user->email }}" />
                                                <x-form.select title="Role" name="role">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}"
                                                            {{ $user->roles()->find($role->id) ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </x-form.select>
                                                <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                                            </form>
                                        </x-modal.modal>
                                        <x-button.button-delete id="{{ $user->id }}"
                                            url="{{ route('admin.roles.destroy', $user->id) }}" title="Delete" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table.table-responsive>
                    <div class="d-flex justify-content-end mt-1">{{ $users->links() }}</div>
                </x-card.card-action>
            </div>
        </div>
    </div>
@endsection
