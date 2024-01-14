@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <a class="btn" href="{{route('admin.projects.index')}}">Back</a>
    </div>
    <div class="container">

            <h1>Page EDIT</h1>
        <form action="{{ route('admin.projects.update', $project ) }}" method="POST" >

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ old('name',$project->name) }}">
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" name="bio" id="bio" rows="3" placeholder="biografia"> {{ old('bio',$project->description) }}</textarea>
            <div class="mb-3">
                <label for="title" class="form-label text-light">Seleziona una categoria</label>
                    <select name="type_id" class="form-control mb-3" id="type_id">
                        <option>Seleziona una categoria</option>
                        @foreach($types as $type)
                          <option @selected( old('type_id', optional($project->type)->id) == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
              </div>
            <div class="">
                <input type="submit" class="btn btn-primary my-3" value="Edit">
            </div>
        
        
      </form>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    
@endsection