@extends('layout')

@section('content')
<div class="row mb-3">
    <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h2>Edit Student</h2>
        <a class="btn btn-secondary" href="{{ route('students.index') }}">Back</a>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name:</label>
        <div class="col-sm-10">
            <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control" placeholder="Name" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
            <input type="email" name="email" value="{{ old('email', $student->email) }}" class="form-control" placeholder="Email" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
        <div class="col-sm-10">
            <input type="number" name="phone" value="{{ old('phone', $student->phone) }}" class="form-control" placeholder="Phone" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="section" class="col-sm-2 col-form-label">Section:</label>
        <div class="col-sm-10">
            <input type="text" name="section" value="{{ old('section', $student->section) }}" class="form-control" placeholder="Section" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="image" class="col-sm-2 col-form-label">Image:</label>
        <div class="col-sm-10">
            <input type="file" name="image" class="form-control">
            @if($student->image)
                <div class="mt-2">
                    <img src="/image/{{ $student->image }}" width="80" height="80" class="rounded" style="object-fit: cover;">
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection
