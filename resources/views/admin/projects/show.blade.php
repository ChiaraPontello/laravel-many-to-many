@extends('layouts.app')
@section('content')
    <section class="container my-3" id="item-post">
        <div class="d-flex justify-content-between align-item-center">
            <h1>{{$project->title}}</h1>
            <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-success px-3">Edit</a>
        </div>
        <div>
        <p>{{!! $project->body !!}}></p>
                @if ($project->category)
            <div class="mb-3">
                <h4>Category</h4>
                <a href="{{route('admin.categories.show', $project->category->slug)}}">{{$project->category->name : 'Uncategorized'}}</a>
            </div>
        @endif
        <img src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}">

        </div>
    </section>

@endsection
