<?
	//conexao ao y sql_regcase
	$conexao = mysqli_connect("localhost","root","","epcc");
	//receber o parametro via request ajax
	$isbn = $_GET["isbn"];
	//executar a query 
	$rs = mysqli_query($conexao,"SELECT * FROM livro WHERE isbn='$isbn'");
	//qt de linha retornadas
	$row =mysqli_num_rows($rs);
	if($row > 0){
		//gerar o xml 
		$xml ='<?xml version="1.0" enconding="ISO-8859-1"?>';
		$xml .= "<livros>";
		//percorrer os dados retornados
		while($l = mysqli_fetch_array($rs)){
			$xml .= "<livro>";
				$xml .= "<isbn>".$1['isbn']."</isbn>";
				$xml .= "<titulo>".$1['titulo']."</titulo>";
				$xml .= "<edicao>".$1['edicao_num']."</edicao>";
				$xml .= "<publicacao>".$1['ano_publicacao']."</publicacao>";
			$xml .= "<livro>";
		}//end while
		$xml .= "</livros>";
		//saida para o browser
		header("Content-type: application/xml; charset=iso-8859-1");
	}//end if
	//Return do xml
	echo $xml;
?>