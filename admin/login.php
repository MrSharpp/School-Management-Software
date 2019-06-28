<?php 
  session_start();
  if(isset($_SESSION['username']))
  {
    header("Location: index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" id="form">
                    <div class="form-group">
                      <input type="email" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'];?>" class="form-control form-control-user" id="InputEmail" name="InputEmail" aria-describedby="emailHelp" placeholder="Enter your Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>" class="form-control form-control-user" name="InputPassword" id="InputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <?php if(isset($_COOKIE['checkbox'])){ ?>
                        <input type="checkbox" name='rememberMe' class="custom-control-input" id="customCheck" checked>
                      <?php }else{ ?>
                        <input type="checkbox" name='rememberMe' class="custom-control-input" id="customCheck">
                      <?php } ?>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <a href="#" onclick="login();" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
                    <hr>
                  </form>

                   <script type="text/javascript">
                 function login()
                 {
                  if($('#InputEmail').val() == '')
                  {
                    alert('Please enter FirstName');
                  }
                  else if($('#InputPassword').val() == '')
                  {
                    alert('Please enter Password');
                  }
                  else{
                  $.ajax({
                    url:"login_form.php",
                    method: "POST",
                    data: $('#form').serialize(),
                    success: function(res){
                      if(res == '1')
                      {
                        $msg = '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Incorrect username or password</div>';
                        $('#msg').html($msg);
                      }
                      else if(res == '0')
                      {
                        window.location = 'index.php';
                      }
                      else if(res == "D")
                      {
                        $('#errorModal').modal('show');
                      }
                      else
                      {
                        console.log(res);
                      }
                    }
                  });
                 }
               }
              </script>

                          <!-- Modal -->
            <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Id Desabled</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   Oops! It seems that your id is desabled by the admin, please try to contact admin.
                  </div>
                </div>
              </div>
            </div>
                  <div id='msg'> 
                  
                </div>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                  
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
