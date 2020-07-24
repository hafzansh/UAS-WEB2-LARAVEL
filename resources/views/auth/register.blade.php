@extends('layouts.auth')
@section('content')
<body class="bg-info">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Perpusku</h3></div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="small mb-1">{{ __('Nama') }}</label>                                    
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} py-4" name="name" value="{{ old('name') }}" placeholder="Enter Name" required autofocus>
                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmailAddress" class="small mb-1">{{ __('E-Mail Address') }}</label>                                    
                                            <input id="inputEmailAddress" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} py-4" name="email" value="{{ old('email') }}" placeholder="Enter E-Mail Address" required>
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="small mb-1">{{ __('Password') }}</label>                                    
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} py-4" placeholder="Enter Password" name="password" value="{{ old('password') }}" required>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif                                    
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm" class="small mb-1">{{ __('Confirm Password') }}</label>                                    
                                            <input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} py-4" placeholder="Enter Password" name="password_confirmation" value="{{ old('password') }}" required>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif                                    
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <button type="sumbit" class="btn btn-primary">Register</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="login" class="btn btn-danger">Batal</a>
                                        </div>                                     
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{route('login')}}">Already have an account? Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </main>
        </div>

@endsection

