<!--ABRE TAG PHP-->
<?php
//INICIA UMA SESSION
session_start();
//INCLUI A CLASSE ADMIN
require_once '../../Class/Admin.php';
//CRIA UM OBJETO DE ADMIN
$adm = new Admin();
//PASSA OS PARAMETROS DE CONEXAO
$adm->connection("clientsadm", "localhost", "root", "");
//VERIFICA SE A SESSION DO USUARIO EXISTE
if(!isset($_SESSION['id_user']) && !isset($_SESSION['name_user'])  ){
  header("Location:../../index.php");
  exit;
}

?>
<!--FECHA TAG PHP-->

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Clients Administration</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
   <link rel="stylesheet" href="../../css/menu/menu.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class=" menu content-wrapper full-page-wrapper d-flex align-items-center auth ">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h2>Cadastro de Administrador</h2>
               
                <form method="POST"  class="pt-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" name="name" class="form-control"  placeholder="Nome">
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control"  placeholder="Email">
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Senha</label>
                     <input class="form-control"   type="password" name="pass" placeholder="Senha">
                      <br/>
                      <input class="btn btn-block btn-dark btn-lg font-weight-medium" type="submit">
                  </div>
 
                  </div>
                </form>

                <!--ABRE TAG PHP-->
                 <?php
                 //VERIFICAR SE FOI ENVIADO OS DADOS
                  if(isset($_POST['name']))
                  {

                    $name = addslashes($_POST['name']);
                    $email = addslashes($_POST['email']);
                    $pass = addslashes(md5($_POST['pass']));
                    

                    //VERIFICAR SE OS CAMPOS ESTÃO VAZIOS
                    if(!empty($name) && !empty($email) && !empty($pass))
                    {

                      
                      //VERIFICA A CONEXAO
                      if($adm->error == "")
                      {
                       
                       //ACESSA O METODO REGISTER
                        if($adm->register($name, $email, $pass)){
                        
                          echo "<br/>";
                          echo "<p class='bg-primary text-light text-center'>Cadastrado com sucesso";
                          header("location:../../home.php");
                        }else{

                         echo "<br/>";
                          echo "<p class='bg-warning text-dark text-center'>Email já Cadastrado";
                        }
                      }else
                      {
                        echo "erro" .$adm->error;
                      }
                    }else{
                     echo "<br/>";
                          echo "<p class='bg-danger text-dark text-center'>ERRO! Preencha todos os campos!";
                    }
                  }


                ?>
                <!--FECHA TAG PHP-->
                
               
              </div>
            </div>
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
  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
