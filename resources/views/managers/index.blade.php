@extends('layouts.app')

@section('title', 'Managers')

@section('content')

<section class="h-100 mt-5">
    <div class="card w-100 bg-transparent text-light text-center border border-light">
        <div class="card-title text-start p-3 d-flex justify-content-between" style="align-items: baseline;">
            <h1>Managers</h1>
            <a href="{{ route('managers.create') }}" class="btn btn-success">Add Manager <i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr class="table-light">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Picture</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($managers as $manager)
                    <tr>
                        <td>{{ $manager->id }}</td>
                        <td>{{ $manager->fname }}</td>
                        <td>{{ $manager->lname }}</td>
                        <td><a href="mailto:{{ $manager->email }}">{{ $manager->email }}</a></td>
                        <td><img src="{{ asset('storage/' . $manager->picture) }}" width="50" height="50" alt="profile image"></td>
                        <td>
                            <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('managers.destroy', $manager->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
