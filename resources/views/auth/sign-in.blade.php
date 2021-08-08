@extends('_layout')

@section('main')
    <form class="d-flex flex-column gap-2" action="{{ route('auth.sign-in') }}" method="post">
        <input type="email" name="email" class="form-control" placeholder="Email" title="Email">
        <input type="password" name="password" class="form-control" placeholder="Password" title="Password">
        <input type="submit" class="btn btn-dark" value="Sign In">
        @csrf
    </form>
@endsection
