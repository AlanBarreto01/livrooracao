<?php

class Teste{
	 function setDescription()
	{
		
		//cria o nome do arquivo de texto
		$filename = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"description" . DIRECTORY_SEPARATOR . 
			"products" . DIRECTORY_SEPARATOR . 
			"teste" . ".txt";

		//conteudo do arquivo

		$array = $_POST['desdescription'];
		

		$file = fopen($filename, "w");

		fwrite($file, $array);

		fclose($file);

	}

}

$teste = new Teste();

$teste -> setDescription();

?>