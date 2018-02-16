<?
try{
	//conexao ao mysql
	$conexao = mysqli_connect("localhost","root","","epcc");
	//executar a query
	$rs = mysqli_query($conexao,"SELECT * FROM livro");
}catch(Exception $e){
	$msg= $e -> getMessage();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ajax -Base de Dados</title>
		<script type="text/javascript">
			function Ajax(isbn){
				var ajax = typeof XMLHttpRequest != 'undefined' ? newXMLHttoRequest() : new ActiveXObject('Microsoft.XMLHTTP');
				ajax.open("GET","livro.php?isbn=" + isbn,true);
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 1){
							mensagem("Carregando...");
						}
					if(ajax.readyState == 4){
						if(ajax.responsXML){
							processXml();
						}else{
							mensagem("Erro no carregamento!!!");
						}
					}				
				};
				ajax.send();
				return false;
			}//end if de dadosAjax
		</script>
		<script type="text/javascript">
			function processXML(obj){
				//captura a tag livro do xml_error_string
				var dataArray = obj.getElementsByTagName("livro");
				if(dataArray.lenght > 0){
					//percorrer o arquivo XML e extrair os dados
					for(var i=0; i< dataArray.lenght; i++){
						var item = dataArray[i];
						//conteudo dos campos do arquivo xml
						var isbn = item.getElementsByTagName("isbn")[0].firstChild.nodeValue;
						var titulo = item.getElementsByTagName("titulo")[0].firstChild.nodeValue;
						var edicao = item.getElementsByTagName("edicao")[0].firstChild.nodeValue;
						var publicacao = item.getElementsByTagName("publicacao")[0].firstChild.nodeValue;
					}
					mensagem("Carregamento de dados com sucesso!!!");
					document.getElementById('isbn').innerHTML = isbn;
					document.getElementById('titulo').innerHTML = titulo;
					document.getElementById('edicao').innerHTML = edicao;
					document.getElementById('publicacao').innerHTML = publicacao;
				}
			}
		</script>
	</head>
	<body>
		<p>Texto: Sérgio Araújo.</p>
		<script type="text/javascript">
			alert("Aula 1- Depois do P");
		</script>
	</body>
</html>