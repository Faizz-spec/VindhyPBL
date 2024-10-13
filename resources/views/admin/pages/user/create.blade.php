@extends('admin.master')

@section('title')
    Create new user
@endsection

@section('content')
<div class="container">
    <h2 class="title">Create new user</h2>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="project-form">
            <div class="main-form single">
                <div class="form-input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="form-input">
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="form-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-input">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form-action">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </div> 
        <button type="submit">click</button>       
    </form>
</div>
@endsection