 @extends('layouts.template')

 @section('content')   
 <div class="center">
    <img src="https://i.imgur.com/KZcPvzE.png">
        <h2> Login Portal</h2>

        <div class="container" id="center">
            <div class="rowCustom">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="tab-pane fade show active" id="hdLogin" role="tabpanel" aria-labelledby="hdLogin-tab" >
                        {{-- Login Section Username --}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                    <label for="username" class="col-md-4 col-form-label" name="username">Username</label>
        
                                    <div class="col-md-6 center">
                                        <input id="username" type="string" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
        
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                        
                        {{-- Login Section Password --}}
                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label" name="password">Password</label>
                                <div class="col-md-6 center">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        {{-- Remember me CheckBox --}}
                        <div class="form-group">
                                <div class="col-md-6 center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                        </div>

                        {{-- Login Button --}}
                        <div class="form-group mb-0">
                                <div class="col-md-8 center">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>  
            </div>
        </div>
    </div>
@endsection