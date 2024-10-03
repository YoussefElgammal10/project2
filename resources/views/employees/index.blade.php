@extends('layouts.app')

@section('title', 'Employees')

@section('content')

<section class="h-100 mt-5">
    <div class="card w-100 bg-transparent text-light text-center border border-light">
        <div class="card-title text-start p-3 d-flex justify-content-between" style="align-items: baseline;">
            <h1>Employees</h1>
            <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee <i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            @if($employees->isEmpty())
                <p>No employees found.</p>
            @else
                <table class="table table-dark">
                    <thead>
                        <tr class="table-light">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Picture</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $emp)
                        <tr>
                            <td>{{ $emp->id }}</td>
                            <td>{{ $emp->name }}</td>
                            <td><a href="mailto:{{$emp->email}}">{{$emp->email}}</a></td>
                            <td><a href="tel:{{$emp->phone}}">{{$emp->phone}}</a></td>
                            <td><img src="{{ asset('storage/' . $emp->picture) }}" width="50" height="50" alt="profile image"></td>
                            <td>
                                <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</section>

@endsection
