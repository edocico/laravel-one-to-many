@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn my-3" href="{{ route('admin.projects.index') }}">Back</a>
    </div>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$project->name}}</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary"><a href="">{{$project->link}}</a></h6>
              <p class="card-text">{{$project->description}}</p>
              <p class="card-text">{{$project->type->name ?? '/'}}</p>
              <a class="btn btn-primary my-2" href="{{route('admin.projects.edit', $project)}}">Edit</a>
              <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            </div>
          </div>
    </div>    
@endsection