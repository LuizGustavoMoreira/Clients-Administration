<!--ABRE TAG PHP-->
<?php
//INICIA UMA SESSION
session_start();
//INCLUI A CLASSE CLIENTE
require_once '../../Class/Client.php';
//CRIA UM OBJETO DA CLASSE
$cliente = new Client();
//PASSA PARAMETROS DE CONEXAO
$cliente->connection("clientsadm", "localhost","root", "");
//VERIFICAR SE EXISTE AS SESSIONS DO USUARIO
if(!isset($_SESSION['id_user']) && !isset($_SESSION['name_user'])){
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
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth menu">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                
                <!--ABRE TAG PHP-->
               <?php
              //VERIFICA SE O ID ENVIADO NÃO É VAZIO
               if($_GET['id'] != ""){
                $id = addslashes($_GET['id']);

               }

               //PASSA OS VALORES DE BUSCA PARA A VARIAVEL
                $result = $cliente->findClient($id);

                //VERIFICA SE FOI ENVIADO OS DADOS 
                if(isset($_POST['name']))
                    {
                    $name = addslashes($_POST['name']);
                    $email = addslashes($_POST['email']);
                    $sexo = addslashes($_POST['sexo']);
                    $category = addslashes($_POST['category']);
                    $phone = addslashes($_POST['phone']);
                    $date = addslashes($_POST['date']);
                  
                    //ACESSA O METODO EDITAR INFO
                    if($cliente->editClient($id,$name,$email,$sexo,$category,$phone,$date))
                    {
                      header("location: ../tables/data-table.php");
                    }
                   
                  }


               ?>
               <!--FECHA TAG PHP-->
               <h2 >Editar dados de <?=$result['nome']?></h2>
                <form method="POST"  class="pt-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $result['nome']?>" placeholder="Nome">
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $result['email']?>" placeholder="Email">
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Sexo</label>
                     <input class="form-control"   type="text" value="<?php echo $result['sexo']?>" name="sexo">
                 
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword2">Categoria</label>
                     <input class="form-control"  type="text" value="<?php echo $result['categoria']?>" name="category">
                   
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Celular</label>
                    <input type="number" name="phone" class="form-control" value="<?php echo $result['tel']?>"  id="exampleInputEmail1" placeholder="Celular">
                    
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Reagendar para :</label>
                    <input type="date" name="date" class="form-control" value="<?php echo $result['data']?>"  id="exampleInputEmail1" placeholder="Celular">
                    
                  </div>
                  <div class="mt-5">
                    <input class="btn btn-block btn-dark btn-lg font-weight-medium"   type="submit">
                  </div>
                  
                
                </form>    
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
