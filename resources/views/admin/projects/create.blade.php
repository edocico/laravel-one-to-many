@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ old('name') }}">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Deascription</label>
                <textarea class="form-control" name="description" id="description" rows="5" placeholder="description" >{{ old('description') }}</textarea>
                <select name="type_id" class="form-control" id="type_id">
                    <option disabled selected value>Seleziona una classe</option>
                    
                    @foreach($types as $type)
                    <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
        
              </div>
              <div>
                <input type="submit" class="btn btn-primary" value="Add">
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