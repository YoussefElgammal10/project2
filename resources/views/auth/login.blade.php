@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="h-100 mt-5">
    <div class="card w-100 bg-transparent text-light text-center border border-light">
        <div class="card-title p-3">
            <h1>Login Page</h1>
        </div>
        <div class="card-body text-start">
            <form class="px-5" action="{{ route('login.action') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">* {{$message}}</small>
                    @enderror
                    <div class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                        <small class="text-danger">* {{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <div class="mt-3">
                <a href="{{ route('register') }}" class="btn btn-secondary">Register New</a>
            </div>
        </div>
    </div>
</section>

@endsection

