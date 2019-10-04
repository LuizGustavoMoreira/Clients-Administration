<!--ABRE TAG PHP-->
<?php
//INICIA UMA SESSION
session_start();
//INCLUI CLASSE ADMIN
require_once 'Class/Admin.php';
//CRIA UM OJETO DA CLASSE
$adm = new Admin(); 
//PASSA OS PARAMETROS DE CONEXAO
$adm->connection("clientsadm", "localhost","root", "");
//VERIFICA SE EXISTE A SESSION DO USUARIO
if(!isset($_SESSION['id_user']) && !isset($_SESSION['name_user']) ){
  header("location:index.php");
  exit();
}
?>
<!--FECHA TAG PHP-->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Client Administration</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu/menu.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="images/logoTesoura.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logoTesoura.svg" alt="logo"/></a>
      </div>
      <div class="menu navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item dropdown d-none d-lg-flex">
            <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="#" data-toggle="dropdown">
              <span class="btn">+ Cadastrar</span>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="pages/samples/registerClient.php">
                <i class="icon-user text-primary"></i>
                Cliente
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="pages/samples/registerAdmin.php">
                <i class="icon-user-following text-warning"></i>
                Administrador
              </a>
             
            </div>
          </li>

           <li class="nav-item dropdown d-none d-lg-flex">
            <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="#" data-toggle="dropdown">
              <span class="btn">Opções</span>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="Class/logout.php">
                <i class="icon-user text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
       
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles primary"></div>
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles pink"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <ul class="nav nav-tabs" id="setting-panel" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
            </li>
          </ul>
          <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
              <div class="add-items d-flex px-3 mb-0">
                <form class="form w-100">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                  </div>
                </form>
              </div>
              <div class="list-wrapper px-3">
                <ul class="d-flex flex-column-reverse todo-list">
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Team review meeting at 3.00 PM
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Prepare for presentation
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Resolve all the low priority tickets due today
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked>
                        Schedule meeting for next week
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked>
                        Project review
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                </ul>
              </div>
              <div class="events py-4 border-bottom px-3">
                <div class="wrapper d-flex mb-2">
                  <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                  <span>Feb 11 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
                <p class="text-gray mb-0">build a js based app</p>
              </div>
              <div class="events pt-4 px-3">
                <div class="wrapper d-flex mb-2">
                  <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                  <span>Feb 7 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                <p class="text-gray mb-0 ">Call Sarah Graves</p>
              </div>
            </div>
            <!-- To do section tab ends -->
            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
              <div class="d-flex align-items-center justify-content-between border-bottom">
                <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
              </div>
              <ul class="chat-list">
                <li class="list active">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Thomas Douglas</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">19 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="offline"></span></div>
                  <div class="info">
                    <div class="wrapper d-flex">
                      <p>Catherine</p>
                    </div>
                    <p>Away</p>
                  </div>
                  <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                  <small class="text-muted my-auto">23 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Daniel Russell</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">14 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="offline"></span></div>
                  <div class="info">
                    <p>James Richardson</p>
                    <p>Away</p>
                  </div>
                  <small class="text-muted my-auto">2 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Madeline Kennedy</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">5 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Sarah Graves</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">47 min</small>
                </li>
              </ul>
            </div>
            <!-- chat tab ends -->
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="profile-image">
                  <img src="images/user.svg"/>
                  <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
                  <p class="name">
                    <?php echo $_SESSION['name_user'];?>
                  </p>
                  <p class="designation">
                     Admin
                  </p>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="icon-rocket menu-icon"></i>
                <span class="menu-title">Home</span>
             
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Usuários</span>
               
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                  
                  <li class="nav-item"> <a class="nav-link" href="pages/tables/data-table.php">Listar</a></li>    
                </ul>
              </div>
            </li>
     
          </ul>
        </nav>
        <!-- partial -->
        <div class="content-wrapper bg-dark ">
          <h1 class="text-light ">Olá ,  <?php echo $_SESSION['name_user'];?></h1>

          <div class="row align-items-center ">
            <div class="col-lg-12">
              <div class="card w-50 my-4">
                <div  class="card-body  bg-light text-dark ">
                  <h2 class="card-title text-center text-dark">Editar informações</h2>
                  <form class="cmxform" id="signupForm" method="POST" >
                    <fieldset>
                      <div class="form-group">
                        <label for="firstname">Nome</label>
                        <input style="border-color: #8c8c8c;border-radius: 14px;" id="firstname" class="form-control"  name="name" type="text" value="<?=$_SESSION['name_user'];?>">
                      </div>
                      
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input style="border-color: #8c8c8c;border-radius: 14px;" id="email" class="form-control" name="email" type="email"  value="<?=$_SESSION['email_user'];?> " >
                      </div>

                      <div class="form-group">
                        <label for="username">Senha</label>
                        <input style="border-color: #8c8c8c;border-radius: 14px;" id="pass" class="form-control " name="pass" type="password" >

                      </div>
                      <input class="btn btn-dark align-self-center mx-auto" type="submit" value="Salvar">
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--ABRE TAG PHP-->
          <?php
          //VERIFICA SE A SESSION ESTÁ VAZIA OU NÃO
          if($_SESSION['id_user'] != "")
          {
            $id = $_SESSION['id_user'];
          }
          //PEGA OS RESULTADOS DE BUSCA
          $result = $adm->findAdmin($id);
          //VERIFICA SE FOI ENVIADO
          if(isset($_POST['name'])){

            $name = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $pass = addslashes($_POST['pass']);
            
            //JOGA O VALOR DA SESSION NA SENHA ATUAL
            $password = $_SESSION['pass_user'];
            //JOGA OS VALORES DIGITADOS PARA A SESSION
            $_SESSION['name_user'] = $name;
            $_SESSION['email_user'] = $email;
            
           
            //VERIFICA SE A SENHA DIGITA É VAZIA
            if($pass == "")
            {
              //ACESSA O METODO EDITAR INFO DO ADMIN
              if($adm->editAdmin($id,$name,$email,md5($password)))
              {
                 echo "<script>location.href = 'home.php'</script>";
                  echo "<br/>";
                echo  "<p class=' bg-warning text-center font-weight-bold'><strong>Dados editados com sucesso!</strong></p>";
              }else{
              echo "Erro";
              }
            }//VERIFICA SE A SENHA DIGITA É DIFERENTE DA ATUAL E SE OS CAMPOS
            //NOME E EMAIL SÃO DIFEENTES DE VAZIO
            else if($pass != $password || $name != "" || $email != "")
            {  
              //JOGA O VALOR DA SENHA DIGITA PARA A SESSION
              $_SESSION['pass_user'] = $pass;
              //PASSA OS VALORES DA SESSION PARA OS CAMPOS DIGITADOS
             $name = $_SESSION['name_user'];
             $email = $_SESSION['email_user'];

             //ACESSA O METODO EDITAR
             if($adm->editAdmin($id,$name,$email,md5($pass)))
              {
                 echo "<script>location.href = 'home.php'</script>";
                echo "<br/>";
                echo  "<p class=' bg-warning text-center font-weight-bold'><strong>Dados editados com sucesso!</strong></p>";
               
              }else{
              echo "Erro";
              }
              //VERIFICA SE A SENHA ATUAL É IGUAL A SENHA DIGITADA
            }else if($pass == $password)
            {
              echo "<br/>";
                echo  "<p class=' bg-danger text-center font-weight-bold'><strong>Você já possui esta senha</strong></p>";
            }
          }
          ?>
          <!--FECHA TAG PHP-->
          </div>
  
        <footer class="footer ">
          <div class="container-fluid">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2017 <a href="#">UrbanUI</a>. All rights reserved.</span>
           
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="js/editInfo/index.js"></script>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/raphael/raphael.min.js"></script>
  <script src="node_modules/morris.js/morris.min.js"></script>
  <script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
?>