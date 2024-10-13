@extends('admin.master')

@section('title')
    Categori
@endsection

@section('content')
    <div class="container">
        <h2 class="title">Category</h2>
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
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="project-form">
                <div class="main-form">
                        <div class="form-input">
                            <label for="category">Add New Category</label>
                            <div class="category">
                                <input type="text" name="name" id="category" placeholder="Enter Category Name" value="{{ old('name') }}">
                                <div class="form-action">
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>         
        </form>
        <table class="category-table">
            <tr>
                <th class="cnum">No</th>
                <th class="cname">Category Name</th>
                <th class="csum">Jumlah Project</th>
                <th class="cact">Action</th>
            </tr>
            @foreach ($categories as $categori)
            <tr>
                <td class="cnum">{{ $loop->iteration }}</td>
                <td class="cname">{{ $categori->name }}</td>
                <td class="csum">{{ $categori->jumlah }}</td>
                <td class="cact">
                    <form action="{{ route('category.destroy', $categori->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="delete-button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
</div>
@endsection