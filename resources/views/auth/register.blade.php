@extends('auth.master', [ 'styles' => [asset('css/register.css')] ])

@section('title', 'Register')

@section('content')
    <div class="row p-5 justify-content-center ">
      <div class="col-md-4 register-form">
        <p class="title">Register</p>
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
        <form method="post" action="/register">
            {{ csrf_field() }}
          <div class="form-group @if($errors->has('first_name')) has-danger @endif"> <label for="first_name">First Name*</label>
            <br>
            <input type="text" value="{{ old('first_name') }}" name="first_name" placeholder="Enter your first name" class="form-control @if($errors->has('first_name')) is-invalid @endif" required="true" >
            @if($errors->has('first_name'))
                <div class="invalid-feedback"> {{ $errors->first('first_name') }} </div>
            @endif
          </div>
          <div class="form-group @if($errors->has('last_name')) has-danger @endif"> <label for="last_name">Last Name</label>
            <br>
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Enter your last name" class="form-control @if($errors->has('last_name')) is-invalid @endif">
              @if($errors->has('last_name'))
                  <div class="invalid-feedback"> {{ $errors->first('last_name') }} </div>
              @endif
          </div>
          <div class="form-group @if($errors->has('telephone')) has-danger @endif"> <label for="telephone">Telephone*</label>
            <br>
            <input type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="Enter your telephone number" class="form-control @if($errors->has('telephone')) is-invalid @endif" required="true" >
              @if($errors->has('telephone'))
                  <div class="invalid-feedback"> {{ $errors->first('telephone') }} </div>
              @endif
              <small id="telephoneHelp" class="form-text text-muted">We will use this as your username</small>
          </div>
          <div class="form-group @if($errors->has('password')) has-danger @endif"> <label for="password">Password*</label>
            <br>
            <input type="password" name="password" placeholder="Enter a strong password" class="form-control @if($errors->has('password')) is-invalid @endif" required="true">
              @if($errors->has('password'))
                  <div class="invalid-feedback"> {{ $errors->first('password') }} </div>
              @endif
              <small id="passwordHelp" class="form-text text-muted">Use a strong password</small>
          </div>
          <div class="form-group @if($errors->has('password_confirmation')) has-danger @endif"> <label for="passwordConfirm">Confirm Password*</label>
            <br>
            <input type="password" name="password_confirmation" placeholder="Enter again your password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" required="true">
              @if($errors->has('password_confirmation'))
                  <div class="invalid-feedback"> {{ $errors->first('password_confirmation') }} </div>
              @endif
          </div>
          <div class="form-group @if($errors->has('email')) has-danger @endif"> <label for="email">Email</label>
            <br>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" class="form-control @if($errors->has('email')) is-invalid @endif">
              @if($errors->has('email'))
                  <div class="invalid-feedback"> {{ $errors->first('email') }} </div>
              @endif
              <small id="emailHelp" class="form-text text-muted">To send you news or password reset links</small> </div>
          <div class="form-group text-center @if($errors->has('agree')) has-danger @endif">
            <div class="form-check"> <label class="form-check-label">
          			<input class="form-check-input @if($errors->has('agree')) is-invalid @endif" type="checkbox" @if(old('agree')) checked @endif required="true" name="agree"> I agree to all license terms
        			</label>
                @if($errors->has('agree'))
                    <div class="invalid-feedback"> {{ $errors->first('agree') }} </div>
                @endif
            </div>
            <div class="form-check"> <label class="form-check-label">
          			<input class="form-check-input" type="checkbox" @if(old('subscribe')) checked @endif name="subscribe"> Subscribe me to news letter
        			</label> </div>
          </div>
          <div class="form-group text-center">
            <button type="submit" name="submit" class="btn btn-primary">Register now</button>
          </div>
          <div class="text-center">
            <a href="/login">Already an user? Login here</a>
          </div>
        </form>
      </div>
    </div>
@endsection