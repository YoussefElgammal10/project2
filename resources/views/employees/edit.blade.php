@extends('layouts.app')

@section('title', 'Employees | Edit')

@section('content')

<section class="h-100 mt-5">
    <div class="card w-100 bg-transparent text-light text-center border border-light">
        <div class="card-title text-start p-3 d-flex justify-content-between" style="align-items: baseline;">
            <h1>Edit Employee | ID: {{ $employee->id }}</h1>
        </div>
        <div class="card-body text-start">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
                    @error('name')
                        <small class="text-danger">* {{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
                    @error('phone')
                        <small class="text-danger">* {{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}">
                    @error('email')
                        <small class="text-danger">* {{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <input type="file" class="form-control" id="picture" name="picture">
                </div>
                <button type="submit" class="btn btn-primary">Update <i class="fa fa-edit"></i></button>
            </form>
        </div>
    </div>
</section>

@endsection
