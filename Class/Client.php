<?php



class Client  {

	private  $pdo;
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


	public function register($name,$email,$sexo,$category,$phone){
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT id FROM cliente WHERE email = :EMAIL ");
		$stmt->bindParam(":EMAIL",$email);
		$stmt->execute();

		if($stmt->rowCount() > 0){

		return false;


		}else{

		$stmt = $pdo->prepare("INSERT INTO cliente(nome,email,sexo,categoria,tel) VALUES(:NAME,:EMAIL,
		:SEXO,:CATEGORIA,:TEL)");
			
		$stmt->bindParam(":NAME", $name);
		$stmt->bindParam(":EMAIL", $email);
		$stmt->bindParam(":SEXO", $sexo);
		$stmt->bindParam(":CATEGORIA", $category);
		$stmt->bindParam(":TEL", $phone);

		$stmt->execute();

		return true;
		

		}
		}

	public function listClient(){

		global $pdo;
		

		$stmt = $pdo->prepare("SELECT * FROM cliente ORDER BY nome ");
		
		$stmt->execute();
		return $stmt->fetchAll();
		
		



}

	public function deleteClient($id){
		global $pdo;


		$stmt = $pdo->prepare("DELETE  FROM cliente WHERE id = :ID ");

		$stmt->bindValue(":ID", $id);
		

		$stmt->execute();
	

	}	

	public function findClient($id){
		global $pdo;
		
	
		$stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = :ID");
		$stmt->bindValue(":ID",$id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;

		


	}

	public function editClient($id,$name, $email, $sexo, $category,$phone){
		global $pdo;

		$stmt = $pdo->prepare("UPDATE cliente SET nome = :NAME, email = :EMAIL,
			sexo = :SEXO , categoria = :CATEGORY , tel = :PHONE WHERE id = :ID");
		
		$stmt->bindValue(":ID",$id);
		$stmt->bindValue(":NAME",$name);
		$stmt->bindValue(":EMAIL",$email);
		$stmt->bindValue(":SEXO",$sexo);
		$stmt->bindValue(":CATEGORY",$category);
		$stmt->bindValue(":PHONE",$phone);


		$stmt->execute();
		return true;
		


	}
	

}








?>