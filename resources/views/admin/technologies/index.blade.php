@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Tecnology List</h1>
       <div class="text-end">
        <a class="btn btn-success" href="{{route('admin.tecnologies.create')}}">Crea nuova tecnologia</a>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>

            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tecnologies as $tecnology)
                <tr>
                    <th scope="row">{{$tecnology->id}}</th>
                    <td><a href="{{route('admin.tecnologies.show', $tecnology->slug)}}" title="View Tecnology">{{$tecnology->name}}</a></td>
                    <td>{{Str::limit($tecnology->body,100)}}</td>

                    <td><a class="link-secondary" href="{{route('admin.tecnologies.edit', $tecnology->slug)}}" title="Edit Tecnology"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{route('admin.tecnologies.destroy', $tecnology->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$tecnology->name}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    </section>
     @include('partials.modal-delete')
@endsection
