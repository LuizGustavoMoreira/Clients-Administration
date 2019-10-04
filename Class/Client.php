<!--ABRE TAG PHP-->
<?php


//CLASSE CLIENTE
class Client  {

	//ATRIBUTOS DE CONEXAO
	private  $pdo;
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

	//METODO DE RESGISTRO DO CLIENTE NO BANCO
	public function register($name,$email,$sexo,$category,$phone,$date){
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT id FROM cliente WHERE email = :EMAIL ");
		$stmt->bindParam(":EMAIL",$email);
		$stmt->execute();

		if($stmt->rowCount() > 0){

		return false;


		}else{

		$stmt = $pdo->prepare("INSERT INTO cliente(nome,email,sexo,categoria,tel,data) VALUES(:NAME,:EMAIL,
		:SEXO,:CATEGORIA,:TEL,:DATA)");
			
		$stmt->bindParam(":NAME", $name);
		$stmt->bindParam(":EMAIL", $email);
		$stmt->bindParam(":SEXO", $sexo);
		$stmt->bindParam(":CATEGORIA", $category);
		$stmt->bindParam(":TEL", $phone);
		$stmt->bindParam(":DATA", $date);

		$stmt->execute();

		return true;
		

		}
		}

	//METODO DE PUXAR DADOS DO CLIENTE DO BANCO PARA LISTAR
	public function listClient(){

		global $pdo;
		

		$stmt = $pdo->prepare("SELECT * FROM cliente ORDER BY nome ");
		
		$stmt->execute();
		return $stmt->fetchAll();
		
		



}
	//METODO EXCLUIR CLIENTE DO BANCO
	public function deleteClient($id){
		global $pdo;


		$stmt = $pdo->prepare("DELETE  FROM cliente WHERE id = :ID ");

		$stmt->bindValue(":ID", $id);
		

		$stmt->execute();

		return true;
	

	}	

	//METODO PARA PUXAR INFORMAÇOES DO CLIENTE
	public function findClient($id){
		global $pdo;
		
	
		$stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = :ID");
		$stmt->bindValue(":ID",$id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;

		


	}

	//METODO DE EDITAR INFORMAÇÕES DO CLIENTE NO BANCO
	public function editClient($id,$name, $email, $sexo, $category,$phone,$date){
		global $pdo;

		$stmt = $pdo->prepare("UPDATE cliente SET nome = :NAME, email = :EMAIL,
			sexo = :SEXO , categoria = :CATEGORY , tel = :PHONE, data = :DATA  WHERE id = :ID");
		
		$stmt->bindValue(":ID",$id);
		$stmt->bindValue(":NAME",$name);
		$stmt->bindValue(":EMAIL",$email);
		$stmt->bindValue(":SEXO",$sexo);
		$stmt->bindValue(":CATEGORY",$category);
		$stmt->bindValue(":PHONE",$phone);
		$stmt->bindValue(":DATA",$date);


		$stmt->execute();
		return true;
		


	}
	

}








?>
<!--FECHA TAG PHP-->