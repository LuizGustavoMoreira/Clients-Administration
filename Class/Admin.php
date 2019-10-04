<!--ABRE TAG PHP-->
<?php

//CLASSE ADMIN
class Admin {

	//ATRIBUITOS DE CONEXAO
	private $pdo;
	public $error = "";

//METODO PARA FAZER CONEXAO COM BANCO
public function connection($name,$host,$user,$pass){
		
		global $pdo;
		global $error;

		try{
			$pdo = new PDO("mysql:dbname=".$name.";host=".$host, $user, $pass);

		}catch(PDOException $e){
			$error = $e->getMessage();

		}

		


	}

//METODO DE REGISTRO DOS DADOS DO ADMIN
public function register($name, $email, $pass){
	global $pdo;
	
	$stmt = $pdo->prepare("SELECT id FROM admin WHERE email = :EMAIL");
	$stmt->bindValue(":EMAIL", $email);
	$stmt->execute();

	if($stmt->rowCount() > 0)
	{
		return false;
	}else{
	$stmt = $pdo->prepare("INSERT INTO admin(name, email, pass) VALUES(:NAME,:EMAIL,:PASS)");
	$stmt->bindValue(":NAME", $name);
	$stmt->bindValue(":EMAIL", $email);
	$stmt->bindValue(":PASS", $pass);
	

	$stmt->execute();
	return true;
	}


}


//METODO DE LOGIN PARA O ADMIM
public function login($email,$pass){
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :EMAIL AND pass = :SENHA");
		$stmt->bindValue(":EMAIL", $email);
		$stmt->bindValue(":SENHA", $pass);
		
	
		$stmt->execute();
		

		
		if($stmt->rowCount() > 0){
			
			$resul = $stmt->fetch();
			session_start();
			$_SESSION['id_user'] = $resul['id'];
			$_SESSION['name_user'] = $resul['name'];
			$_SESSION['email_user'] = $resul['email'];
			$_SESSION['pass_user'] = $resul['pass'];

			return true;
			
		}else{

			return false;

		}

	}

//METODO BUSCAR INFORMAÇOES DO ADMIN
public function findAdmin($id){
		global $pdo;
		
	
		$stmt = $pdo->prepare("SELECT * FROM admin WHERE id = :ID");
		$stmt->bindValue(":ID",$id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;

		


	}

	//METODO EDITAR INFORMAÇÕES DO ADMIN
	public function editAdmin($id,$name, $email,$pass){
		global $pdo;

		$stmt = $pdo->prepare("UPDATE admin SET name = :NAME, email = :EMAIL, pass = :PASS
			 WHERE id = :ID");
		
		$stmt->bindValue(":ID",$id);
		$stmt->bindValue(":NAME",$name);
		$stmt->bindValue(":EMAIL",$email);
		$stmt->bindValue(":PASS",$pass);
		
		


		$stmt->execute();
		return true;
		


	}
	

	


}


?>
<!--FECHA TAG PHP-->