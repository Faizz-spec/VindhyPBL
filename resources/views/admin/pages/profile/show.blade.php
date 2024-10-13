@extends('admin.master')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('profile.update') }}" class="profile-form">
            @csrf
            @method('PATCH')
            <div class="head">
                <h2>Informasi Profile</h2>
                <p>Update informasi profile</p>
            </div>
            <div class="form-input profile">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="form-input profile">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}">
            </div>
            <button type="submit">Save</button>
        </form>
        <form action="{{ route('password.update') }}" class="profile-form">
            @csrf
            @method('PATCH')
            <div class="head">
                <h2>Ubah Password</h2>
            </div>
            <div class="form-input profile">
                <label for="old-password">Old Password</label>
                <input type="password" name="current_password" id="old-password">
            </div>
            <div class="form-input profile">
                <label for="new-password">New Password</label>
                <input type="password" name="password" id="new-password">
            </div>
            <div class="form-input profile">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirmed_password" id="confirm-password">   
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
@endsection