@extends('admin.master')

@section('title')
    Edit project
@endsection

@section('content')
<div class="container">
    <h2 class="title">Edit project</h2>
    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="project-form">
            <div class="main-form">
                <div class="form-input">
                    <label for="title">Title</label>
                    <input type="text" name="name" id="title" placeholder="Enter title project" value="{{ $project->name }}">
                </div>
                <div class="form-input">
                    <label for="customer">Customer</label>
                    <input type="text" name="customer_name" id="customer" placeholder="Enter name customer" value="{{ $project->customer_name }}">
                </div>
                <div class="form-input">
                    <label class="form-label" for="desc">Description</label>
                    <textarea name="deskripsi" id="desc" rows="5" placeholder="Description">{{ $project->deskripsi }}</textarea>
                </div>
                <div class="form-input">
                    <label for="image">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $project->image }}">
                    <input type="file" name="image" id="image">
                </div>
            </div>
            <div class="second-form">
                <div class="form-input">
                    <label for="status">Status</label>
                    <select name="status_id" id="status">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ $project->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-input">
                    <label for="category">Device</label>
                    <select name="category_id" id="category">
                        @foreach ($categories as $categori)
                            <option value="{{ $categori->id }}" {{ $project->category_id == $categori->id ? 'selected' : '' }}>{{ $categori->name }}</option>
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
                                <input type="checkbox" name="sparepart[]" id="{{ $sparepart->id }}" value="{{ $sparepart->id }}" 
                                @foreach ($project->sparepart as $part)
                                    {{ $sparepart->id == $part->id ? 'checked' : '' }}
                                @endforeach
                                >
                                
                                <label for="{{ $sparepart->id }}">{{ $sparepart->name }}</label>
                            </li> 
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-input">
                    <label for="price">Harga total</label>
                    <input type="number" name="harga_total" id="price" min="0" value="{{ $project->harga_total }}">
                </div>
                <div class="form-input">
                    <label for="code">Code Project</label>
                    <input type="text" name="code_project" id="code" placeholder="Enter name customer" value="{{ $project->code_project }}">
                </div>
                <div class="form-action">
                    <a href="{{ route('project.index') }}">Cancel</a>
                    <button type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection