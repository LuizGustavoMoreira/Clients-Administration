<?php


class Admin {

	//ATRIBUITOS
	private $pdo;
	public $error = "";

public function connection($name,$host,$user,$pass){
		
		global $pdo;
		global $error;

		try{
			$pdo = new PDO("mysql:dbname=".$name.";host=".$host, $user, $pass);

		}catch(PDOException $e){
			$error = $e->getMessage();

		}

		


	}


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



public function login($email,$pass){
		global $pdo;
		$stmt = $pdo->prepare("SELECT id,name FROM admin WHERE email = :EMAIL AND pass = :SENHA");
		$stmt->bindValue(":EMAIL", $email);
		$stmt->bindValue(":SENHA", $pass);
		
	
		$stmt->execute();
		

		
		if($stmt->rowCount() > 0){
			
			$resul = $stmt->fetch();
			session_start();
			$_SESSION['id_user'] = $resul['id'];
			$_SESSION['name_user'] = $resul['name'];
			return true;
			
		}else{

			return false;

		}

	}

	


}





?>