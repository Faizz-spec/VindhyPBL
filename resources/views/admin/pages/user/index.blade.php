@extends('admin.master')

@section('content')
<div class="container">
    <h2 class="title">User List</h2>
    <div class="sparepart">
        @if (session()->has('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @elseif (session()->has('errors'))
            @foreach ($errors->all() as $error)
                <div class="alert alert-error">
                    {{ $error }}
                </div>
            @endforeach
        @endif
    <div class="header-btn">
        <a href="{{ route('users.create') }}">Add New User</a>
    </div>
    <table class="category-table">
        <tr>
            <th class="cnum">No</th>
            <th class="cname user">Name</th>
            <th class="csum cmail">Email</th>
            <th class="crole">Role</th>
            <th class="cact">Action</th>
        </tr>
        @foreach ($datas as $user)
        <tr>
            <td class="cnum">{{ $loop->iteration }}</td>
            <td class="cname user">
                <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
            </td>
            <td class="csum cmail">{{ $user->email }}</td>
            <td class="crole">{{ $user->role }}</td>
            <td class="cact">
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="delete-button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
</div>
@endsection