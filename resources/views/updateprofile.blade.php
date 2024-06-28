@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Update Profile -->
    <h1 class="text-center py-3 fw-bold">Update Profile</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <form action="{{ route('updateprofile') }}" method="post">
                    @csrf
                    <label for="name">Name: </label>
                    <input type="text" class="form-control mb-3" id="name" name="name" value="{{Auth::user()->name}}" required>
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" required>
                    <button type="submit" class="btn btn-dark mt-3 btn-sm w-100">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection