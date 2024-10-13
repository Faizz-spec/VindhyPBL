@extends('admin.master')

@section('title')
    Sparepart
@endsection

@section('content')
<div class="container">
    <h2 class="title">Sparepart</h2>
    <div class="sparepart">
    <div class="header-btn">
        <a href="{{ route('sparepart.create') }}">Add New Sparepart</a>
    </div>
    <table>
        <thead>
            <tr>
                <th class="sname">Name</th>
                <th class="scat">Category</th>
                <th class="sprice">Price</th>
                <th class="saction">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spareparts as $sparepart)
            <tr>
                <td class="sname"><a href="{{ route('sparepart.edit', $sparepart->id) }}">{{ $sparepart->name }}</a></td>
                <td class="scat">{{ $sparepart->category }}</td>
                <td class="sprice">{{ $sparepart->harga }}</td>
                <td class="saction">
                    <form action="{{ route('sparepart.destroy', $sparepart->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('sparepart.edit', $sparepart->id) }}">Edit</a>
                    <button class="delete" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection