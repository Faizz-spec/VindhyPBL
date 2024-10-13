@extends('admin.master')

@section('title')
    Create new project
@endsection

@section('content')
<div class="container">
    <h2 class="title">Create new project</h2>
    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="project-form">
            <div class="main-form">
                <div class="form-input">
                    <label for="title">Title</label>
                    <input type="text" name="name" id="title" placeholder="Enter title project">
                </div>
                <div class="form-input">
                    <label for="customer">Customer</label>
                    <input type="text" name="customer_name" id="customer" placeholder="Enter name customer">
                </div>
                <div class="form-input">
                    <label class="form-label" for="desc">Description</label>
                    <textarea name="deskripsi" id="desc" rows="5" placeholder="Description"></textarea>
                </div>
                <div class="form-input">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image">
                </div>
            </div>
            <div class="second-form">
                <div class="form-input">
                    <label for="status">Status</label>
                    <select name="status_id" id="status">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-input">
                    <label for="category">Device</label>
                    <select name="category_id" id="category">
                        @foreach ($categories as $categori)
                            <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-input">
                    <label>Sparepart</label>
                    <button type="button" aria-label="sparepart" id="sparepart-button" class="button">
                        <span class="label">Select Sparepart</span>
                    </button>
                    <div class="sparepart-ul">
                        <ul>
                            @foreach ($spareparts as $sparepart)
                            <li>
                                <input type="checkbox" name="sparepart[]" id="{{ $sparepart->id }}" value="{{ $sparepart->id }}">
                                <label for="{{ $sparepart->id }}">{{ $sparepart->name }}</label>
                            </li> 
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-input">
                    <label for="price">Harga total</label>
                    <input type="number" name="harga_total" id="price" min="0">
                </div>
                <div class="form-input">
                    <label for="code">Code Project</label>
                    <input type="text" name="code_project" id="code" placeholder="Enter name customer">
                </div>
                <div class="form-action">
                    <a href="{{ route('project.index') }}">Cancel</a>
                    <button type="submit">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection