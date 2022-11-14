<html>	
	<title> MEU CEP </title>
	<body> 
		<h1> Check CEP </h1>
		<!-- corrigir a action do form para index.php -->
		<form action="index.php" method="post">
		<label> Insira o CEP: </label>
		<input class= "input-cep" type="text" name="cep">
		<input class="input-enviar" type="submit" value="Enviar">
	</body>
</html>
<style>

	*{		
  		margin: 0;
  		padding: 0;
	}

	body {

		background: gray;
		height: 100vh;
		width: 100vw;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}

	h1 {
		font-size: 60px;
		margin-bottom: 50px;
	}

	form{

		background: white;
		height: 300px;
		width: 400px;
		display:flex;
		flex-direction: column;
		align-items: center;
		border: solid green 1px;
		padding: 25px;
	}

	.input-cep{

		all: unset;
		border: solid gray 1px;
		width: 180px;
		height: 25px;
		border-radius: 6px;
		padding-left: 10px;
		margin-top: 10px;

	}

	.input-enviar{

		all: unset;
		background: gray;
    	border-radius: 6px;
    	width: 100px;
    	height: 32px;
		margin-top: 10px;
		text-align:center;
		box-shadow: 3px 3px 3px lightgray;
	}

	.input-enviar:hover{
		
		cursor: pointer;
		opacity: 0.9;
	}

</style>

<?php

if(!empty($_POST['cep'])){
	
	$cep = $_POST['cep'];

	/*fazer a correção do 'cep' na função get_address, na chamada
	'Estado' e 'Rua' da variavel 'address' e tambem da palavra 'logradouro'*/

	$address = (get_address($cep));
	
	echo "<br><br>CEP Informado: $cep<br>";
	echo "<br>Rua: $address->logradouro<br>";
	echo "<br>Bairro: $address->bairro<br>";
	echo "<br>Estado: $address->uf<br>";
};

function get_address($cep){
	
	
	$cep = preg_replace("/[^0-9]/", "", $cep);
	/* consertar a url do viacep */
	$url = "http://viacep.com.br/ws/$cep/xml/";

	$xml = simplexml_load_file($url);
	return $xml;
}

?>