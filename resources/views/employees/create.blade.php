@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')

<section class="h-100 mt-5">
    <div class="card w-100 bg-transparent text-light text-center border border-light">
        <div class="card-title text-start p-3">
            <h1>Add Employee</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter employee name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter employee email" required>
                </div>

                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter employee phone number" required>
                </div>

                <div class="form-group mb-3">
                    <label for="picture">Profile Picture</label>
                    <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success">Add Employee</button>
            </form>
        </div>
    </div>
</section>

@endsection
