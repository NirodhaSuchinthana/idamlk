@extends('auth.master', [ 'styles' => [asset('css/verify.css')] ])

@section('title', 'Admin Login')

@section('content')
    <div class="row p-5 justify-content-center">
        <div class="col-md-4 verify-form">
            <p class="title">Admin Login</p>
            @if(count($errors))
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="text-center">{{ $error }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class="text-center">{{ session('message') }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form method="post" action="/admin/login">
                {{ csrf_field() }}
                <div class="form-group"> <label for="telephone">Email*</label>
                    <br>
                    <input type="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}" class="form-control" required="true" >
                </div>
                <div class="form-group "> <label for="password">Password*</label>
                    <br>
                    <input type="password" name="password" placeholder="Enter your password" class="form-control " required="true" >
                </div>
                <div class="form-check text-center"> <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember Me
                    </label> </div>
                <div class="form-group text-center pt-3">
                    <button type="submit" name="submit" class="btn btn-secondary btn-lg">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection