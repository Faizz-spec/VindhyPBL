@extends('admin.master')

@section('title')
    User Edit
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('users.update', $user->id) }}" class="profile-form" method="POST">
            @csrf
            @method('patch')
            <div class="head">
                <h2>Informasi Profile User {{ $user->name }}</h2>
                <p>Update informasi profile {{ $user->name }}</p>
            </div>
            <div class="form-input profile">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="form-input profile">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}">
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
            </div>
            <div class="form-input profile">
                <label for="name">Role</label>
                <select name="role" id="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ $role == $user->role ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="button">
                <button type="submit">Save</button>
                @if (session('status') === 'profile-updated')
                    <p id="status">Saved</p>
                @endif
            </div>
        </form>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="profile-form">
            @csrf
            @method('DELETE')
            <div class="head">
                <h2>Hapues User {{ $user->name }}</h2>
            </div>
            <button type="submit" class="btn-red">Hapus akun ini</button>
        </form>
    </div>
@endsection