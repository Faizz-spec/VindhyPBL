@extends('admin.master')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="bg-top"></div>
        <div class="content">
        <div class="heading">
            <h2>Dashboard</h2>
            <a href="{{ route('project.create') }}" class="add">Add new project</a>
        </div>
        <div class="modal">
            @foreach ($modals as $modal)
            <div class="list-modal" id="{{ $modal->id }}">
                <div class="modal-title"><strong>{{ $modal->name }}</strong></div>
                <div class="num">{{ $modal->jumlah }}</div>
                <div class="modal-logo {{ $modal->name }}"><i class="fa fa-trash" aria-hidden="true"></i></div>
            </div>
            @endforeach
        </div>
            <div class="box">
                <div class="box-title">List Project</div>
                <div class="box-item">
                    <div class="box-head">
                        <span class="f-one">Project Name</span>
                        <span class="f-two">Harga</span>
                        <span class="f-three">Category</span>
                        <span class="f-four">Status</span>
                    </div>
                    <div class="box-list">
                        @foreach ($projects as $project)
                        <div class="box-list-item">
                            <div class="item-name f-one">{{ $project->name }}</div>
                            <div class="item-hours f-two">{{ $project->harga_total }}</div>
                            <div class="item-priority f-three">{{ $project->category->name }}</div>
                            <div class="item-progress f-four">{{ $project->status->name }}</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="box-button">
                        <a href="{{ route('project.index') }}" rel="nofollow">View all project</a>
                    </div>
                </div>
            </div>
        </div>
@endsection