@extends('admin.master')

@section('title')
Edit Sparepart
@endsection

@section('content')
<div class="container">
    <h2 class="title">Edit Sparepart</h2>
    <form action="{{ route('sparepart.update', $sparepart->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="project-form">
            <div class="main-form single">
                <div class="form-input">
                    <label for="name">Sparepart Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter sparepart name" value="{{ $sparepart->name }}">
                </div>
                <div class="form-input">
                    <label for="category">Device</label>
                    <select name="category" id="category">
                        @foreach ($categories as $categori)
                            <option value="{{ $categori->name }}" {{ $sparepart->category == $categori->id ? 'selected' : '' }}>{{ $categori->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-input">
                    <label for="price">Harga</label>
                    <input type="number" name="harga" id="price" value="{{ $sparepart->harga }}">
                </div>
                <div class="form-action">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </div>        
    </form>
</div>
@endsection