 @extends('layouts.template')

 @section('content')   
    <img src="https://i.imgur.com/KZcPvzE.png">
        <h2> Login Portal</h2>

        <div class="container" id="center">
            <div class="row">
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
                        <form>
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
                        </form>    
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
    <script type="text/javascript">
    document.getElementById("hdSubmit").onclick = function() {
        location.href = "helpDeskLogin.html";
        }
    document.getElementById("spSubmit").onclick = function() {
        location.href = "technicalSpecialistView.html";
        }
    </script>
@endsection