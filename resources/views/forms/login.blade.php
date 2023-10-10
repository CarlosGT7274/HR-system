@extends('layouts.simple')

@section('content')
    <form class="mx-auto d-flex flex-column gap-3 my-5" style="width: 20rem;" method="post" action="{{ route('login.submit') }}">
        @csrf
        <h2>Login</h2>
        <div>
            <label for="email" class="form-label">Email address</label>
            <input class="form-control" id="email" name="email" type="email" placeholder="Enter email">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        
        <div>
            <label for="password" class="form-label">Email address</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Enter password">
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
    
        @if ($message)
            <span class="text-danger">{{ $message }}</span>
        @endif
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
@endsection