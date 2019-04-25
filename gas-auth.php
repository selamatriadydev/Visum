<?php
//error_reporting (0);
require_once ('./include/konek.php');


if (isset($_POST['formsubmitted'])) { //formsubmitted is for execute data from login form
    // Inisialisasi session:
    //session_start();
    $error = array(); //array save all error message
    if (empty($_POST['username'])) { // it will notice you if email is empty
        $error[] = 'Silahkan entri Email Anda.';
    } 

    if (empty($_POST['password'])) { // it will notice you if pass is empty
        $error[] = 'Silahkan entri Password Anda ';
    } 
  
  
    if (empty($error))// if no error, it will continue executing variable
    { 
        $user = $conn->real_escape_string($_POST['username']); //real_escape_string to prevent sql injection
    $password = $conn->real_escape_string($_POST['password']);
        // $pass = hash('sha256', $password); //to match your hashed pass
    $query = $conn->query("SELECT * FROM admin WHERE username='$user' and password = '$password'");  
        $date = date('Y-m-d H:i:s'); //current datetime  
        $count = mysqli_num_rows($query); //count result from your query
    if ($count ==1) // if total data = 1 then continue
        { 
            $how=$query->fetch_array();//all field in table are session variable
            // $query2 = $conn->query("update operator set lastlogin = CURRENT_TIMESTAMP where idoperator = '$_SESSION[idoperator]'");//update last login
            //header("Location:index.php");
            $_SESSION['id_admin']=$how['id_admin'];
            
            echo '<script type="text/javascript">
              window.location.href = "index.php"
           </script>';
          }
          else
        {             
            $msg_error= 'Email / Password anda Salah. Silakan ulangi.';
        }
    
    $conn->close();
    } 
                              }

?>
<!-- Till here -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminRS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./plugins/iCheck/square/blue.css">
  <link rel="shortcut icon" href="./img/logo/man.png" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" 
style="background-image: url('./img/medical.jpg'); 
background-size: cover;
  background-attachment: fixed; /*Background Fixed (Tidak dapat di scroll)*/
 color: #fff;
 background-repeat: no-repeat; /*Background Tanpa Pengulangan*/
 -webkit-background-size: 100% 100%;
   -moz-background-size: 100% 100%;
   -o-background-size: 100% 100%;
   background-size: 100% 100%;
        height: 0% !important; ">
<div class="login-box">
  <div class="login-logo">
    <a href="./"><b>Admin</b>RS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><!-- Sign in to start your session -->
      <?php
                if(isset($_GET["session_expired"])) { //it will appear when session is expired
                echo "<center><p style=color:red>Login Session is Expired. Please Login Again</p></center>";
                }
                ?>

                <?php
        if(isset($msg_error) or !empty($error) ){  //it display when you got error
            if(isset($msg_error)){  
             ?>      
              
              <strong>Perhatian!</strong> <?php echo $msg_error; ?>
              
                      
       <?php }
                        
                if (!empty($error)){  
              ?>
               <div class="row">
                <div class="col-xs-12 text-xs-center">
                <strong>Perhatian!</strong>
                <?php  
                foreach ($error as $key => $values) {                           
                echo ''.$values.', ';
                    }
                    ?>   
                </div>  
              </div>
        <?php 
                        }
                      
                                   } 
        ?>
    </p>


    <form action="" method="post">

          
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="username" required="required">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="formsubmitted" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br> -->
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="./bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="./plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
