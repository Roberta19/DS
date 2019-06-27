<?php
		$usuario = "root";
		$senha = "usbw";
		$host = "localhost";
		$banco = "bd_atividade";
			try{
				$conexao = new PDO('mysql:host='. $host . ':3307;dbname='. $banco, $usuario, $senha);	
			}catch(PDOException $e){
				echo "Erro:" . $e->getMessage();
			}
			
		if(isset($_GET['cadastrar'])){
		$nome = $_GET['nome'];
		$data = $_GET['data_nascimento'];
		$tel = $_GET['telefone'];
		$endereco = $_GET['endereco'];
		$cidade = $_GET['cidade'];
		$email = $_GET['email'];
		$id = 0;

		try{
				$cmd_sql = "INSERT INTO bd_cliente(nome_cliente,data_nascimento,telefone,endereco,cidade,email)VALUES(?,?,?,?,?,?)";
				$stmt = $conexao->prepare($cmd_sql);
				$stmt->bindParam(1,$nome);
				$stmt->bindParam(2,$data);
				$stmt->bindParam(3,$tel);
				$stmt->bindParam(4,$endereco);
				$stmt->bindParam(5,$cidade);
				$stmt->bindParam(6,$email);
				$rs = $stmt->execute();
				if($rs)				
				{
		   echo "<script>alert('Dados gravados com sucesso!');</script>";
				}else{
		   echo "<script>alert('Falha ao tentar gravar o registro!');</script>";
					}
				}catch(PDOException $e){
				print "Erro:" . $e->getMessage();
				
				}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastrar Cliente</title>
<link href="cadastrar.css" rel="stylesheet" type="text/css">
</head>
<body>
	<fieldset>
    	<form action="#" method="get">
        	<p>Nome do Cliente:
            <br><input type="text" name="nome" size="30"></p>
            
            <p>Data de Nascimento:
            <br><input type="date" name="data_nascimento"></p>
            
            <p>Telefone:
            <br><input type="tel" name="telefone" size="20"></p>
            
            <p>Endereço:
            <br><input type="text" name="endereco" size="30"></p>
            
            <p>Cidade:
            <br><input type="text" name="cidade" size="30"></p>
            
            <p>Email:
            <br><input type="text" name="email" size="30"></p>
            
            <p><input type="submit" value="Cadastrar" name="cadastrar"></p>    
            
        </form>
    </fieldset>	
</body>
</html>