@extends('layouts.app')

@section('content')
<div class="container bg-light">
    <div class="container py-2 d-flex justify-content-between">
        <a href="{{ route('admin.dashboard') }}">Back</a>
        <a class="btn btn-primary" href="{{route('admin.projects.create')}}">Add new</a>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="3">Projects</th>             
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                   <tr>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}">{{$project->name}}</a>
                        </td>
                        <td>{{ $project->description }}</td>
                        <td><a href="">{{ $project->link }}</a></td>
                        <td>{{$project->type->name ?? ''}}</td>
                        <th>
                            <a class="btn btn-primary my-2" href="{{route('admin.projects.edit', $project)}}">Edit</a>
                            <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </th>
                    </tr> 
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection