@extends('auth.master', [ 'styles' => [asset('css/verify.css')] ])

@section('title', 'Verify account')

@section('content')
    <div class="row p-5 justify-content-center">
    <div class="col-md-4 verify-form">
        <p class="title">Verify your account now</p>
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
        <form method="post" action="/auth/verify">
            {{ csrf_field() }}
            <div class="form-group @if($errors->has('verification')) has-danger @endif"> <label for="verification">Verification Code*</label>
                <br>
                <input type="text" name="verification" placeholder="Enter your verification code" class="form-control text-center @if($errors->has('verification')) is-invalid @endif" required="true" >
                @if($errors->has('verification'))
                    <div class="invalid-feedback"> {{ $errors->first('verification') }} </div>
                @endif
            </div>
            <input type="hidden" name="user_id" value="{{ session('user_verification_id') }}" />
            <div class="form-group text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Verify Account</button>
            </div>
            <div class="text-center">
                <a href="/auth/resend" class="btn btn-secondary btn-lg">Resend verification code</a>
            </div>
        </form>
    </div>
</div>
@endsection