@extends('layouts.backend.master')

@section('title', 'Profile')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-6">
                <x-card.card title="Account Details">
                    <form action="{{ route('member.profile.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <x-form.input title="Name" name="name" value="{{ $user->name }}" placeholder=""
                                    type="text" />
                            </div>
                            <div class="col-6">
                                <x-form.input title="Email" name="email" value="{{ $user->email }}" placeholder=""
                                    type="email" />
                            </div>
                        </div>
                        <x-form.input title="Avatar" name="avatar" value="{{ $user->avatar }}" placeholder=""
                            type="file" />
                        <x-button.button-save icon="user" title="Update Profile" class="btn btn-primary" />
                    </form>
                </x-card.card>
            </div>
            <div class="col-6">
                <x-card.card title="Update Password">
                    <form action="{{ route('member.profile.updatePassword', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <x-form.input title="Current Password" name="current_password" value=""
                                placeholder="Input your password" type="password" />
                            <div class="col-6">
                                <x-form.input title="New Password" name="password" value="" placeholder="Input new password"
                                    type="password" />
                            </div>
                            <div class="col-6">
                                <x-form.input title="Password Confirmation" name="password_confirmation" value=""
                                    placeholder="Input password confirmation" type="password" />
                            </div>
                        </div>
                        <x-button.button-save icon="lock" title="Update Password" class="btn btn-danger" />
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
