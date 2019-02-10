<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login Page</title>
    <style type="text/css">
        body {
            background-color: #d3d3d3;
            text-align: center;
        }
        .nav-tabs  {
            text-align: center;
        }
        .nav-tabs > li {
            float: none;
            display: inline-block;
            zoom:1;
        }
        .row {
            margin: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            width: 50%;
            padding: 20px;
            border-radius: 30px;
        }
        .login {
            text-align: center;
            margin: 5px;
        }
        #submit {
            width: 50%;
            margin: 5px
        }
        #center {
            text-align: center;
        }
        input {
            border-radius: 5px;
            padding: 5px;

        }
        #hdSubmit {
            border-radius: 5px;
            padding: 5px;
            width: 50%;
        }
        #spSubmit {
            border-radius: 5px;
            padding: 5px;
            width: 50%;
        }
    </style>
  </head>
  <body>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>