<?php

	if(isset($_POST["nome"])){

		$arquivo = "clientes.xml";
	
		if(!file_exists("clientes.xml")){
			$fp = fopen($arquivo,"w");
			
			$conteudo_inicial = '<?xml version = "1.0"?><clientes>cliente></cliente></clientes>';
			
			fwrite($fp,$conteudo_inicial);
			
			fclose($fp);
		}
		
		$xml = simplexml_load_file($arquivo);
		$nova_posicao = sizeof($xml->cliente);
		
		$xml->cliente[$nova_posicao]->nome = $_POST["nome"];
		$xml->cliente[$nova_posicao]->email = $_POST["email"];
		$xml->cliente[$nova_posicao]->senha = $_POST["senha"];
		$xml->cliente[$nova_posicao]->cpf = $_POST["cpf"];
		$xml->cliente[$nova_posicao]->saldo = 0;
		
		$xml->asXML($arquivo);
		
	}
		header("location: index.php");
	
?>