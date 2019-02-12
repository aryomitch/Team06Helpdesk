 @extends('layouts.template')

 @section('content')   
 
    <img src="https://i.imgur.com/KZcPvzE.png">
        <h2> Login Portal</h2>

        <div class="container" id="center">
            <div class="rowCustom">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#hdLogin" id="hdLogin-tab" data-toggle="tab" aria-controls="hdLogin" aria-selected="true">Helpdesk Login</a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="#spLogin" id="spLogin-tab" data-toggle="tab" aria-controls="spLogin" aria-selected="false"> Speicalist Login</a>
                    </li>
                </ul>
                    <div class="tab-content" id="myTabContent">
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

                        <div class="form-group mb-0">
                                <div class="col-md-8 center">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- <form>

                            <div class = "login">
                                <!--Username entry-->
                                <label><b>Helpdesk Username</b></label><br>
                                <input type="text" id="submit" placeholder="Username" required>

                                <!--Password entry-->
                                <!--Could make input type password if you want it to show dots rather than characters-->
                                <br>
                                <label><b>Password</b></label><br>
                                <input type="password" id="submit" placeholder="Password" required>

                                <!--Submit button-->
                                <br>
                                <button id="hdSubmit" type="submit">Login</button>
                            </div>
                        </form>     --}}
                    </div>
                    <div class="tab-pane fade" id="spLogin" role="tabpanel" aria-labelledby="spLogin-tab" >
                        <form>
                            <div class = "login">
                                <!--Username entry-->
                                <label><b>Specialist Username</b></label><br>
                                <input type="text" id="submit" placeholder="Username" required>

                                <!--Password entry-->
                                <!--Could make input type password if you want it to show dots rather than characters-->
                                <br>
                                <label><b>Password</b></label><br>
                                <input type="password" id="submit" placeholder="Password" required>

                                <!--Submit button-->
                                <br>
                                
                                <button id="spSubmit" type="submit">Login</button>
                            </div>
                        </form>    
                    </div>
                    </div>
            </div>  
            </div>
        </div>
    {{-- <script type="text/javascript">
    document.getElementById("hdSubmit").onclick = function() {
        location.href = "helpDeskLogin.html";
        }
    document.getElementById("spSubmit").onclick = function() {
        location.href = "technicalSpecialistView.html";
        }
    </script> --}}
@endsection