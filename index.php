<?php
require_once "Class/Admin.php";
$adm = new Admin();
 $adm->connection("clientsadm", "localhost", "root", "");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Clients Administration</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/squares/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="bg-dark text-light content-wrapper full-page-wrapper  d-flex align-items-center  login-full-bg">
          <div class="  row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="form form-login auth-form-dark text-left p-5">
                <h2 class="text-center">Login</h2>
              
                <form method="POST"  class="pt-5">
                  <div class="form-group">
                    
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                   
                  </div>
                  <div class="form-group">
                   
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Senha">
                    
                  </div>
                  <div class="mt-5">
                    <input class="btn btn-block btn-primary btn-lg font-weight-medium" type="submit">
                  </div>
                                   
                </form>
                <?php
                if(isset($_POST['email']))
                {
                  
                  $email = addslashes($_POST['email']);
                  $pass = addslashes(md5($_POST['password']));
                 
                 }
                 if(!empty($email) && !empty($pass)){
                   if($adm->login($email,$pass)){
                    echo "acertou";
                    header("Location:home.php");


                  }else{
                    ?>
                    <div>
                      <br/>
                        <p class="erro bg-danger  text-center"><strong>Email ou senha incorretos</strong></p>
                    </div>
                    
                    <?php
                  }


                 }else{
                  ?>
                    <div>
                      <br/>
                        <p class="erro bg-danger  text-center"><strong>Preencha todos os campos</strong></p>
                    </div>
                    
                    <?php

                 }
                 

                

                ?>

              </div>
              
          </div>
          <ul class="squares">
               
              </ul>
            </div>
            

        </div>

        <!-- content-wrapper ends -->
      </div>

      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
    
  
  </div>
 
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="js/square/index.js"></script>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
