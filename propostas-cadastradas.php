<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script language="JavaScript">
    function protegercodigo() {
    if (event.button==2||event.button==3){
        alert('Sai fora curioso ;)!');}
    }
    document.onmousedown=protegercodigo
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Propostas Via Varejo</title>
	<link rel="icon" type="image/png" href="deacts.png" />

	<link rel="stylesheet" href="assets/css/main.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
	
</head>

<body>
 <?php
$connect = mysql_connect('127.0.0.1:3306','root','');
$db = mysql_select_db('bdviavarejo');
$tt = mysql_query("SELECT * FROM cliente");

?>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<table width="200" border="1" id="cliente">
  <tr>
    <td>CPF</td>
	<td>Telefone</td>
    <td>Valor</</td>
    <td>Parcelas</td>
	<td>Status</td>
  </tr>
  <?php while ($row = mysql_fetch_assoc($tt)): ?>
  <tr>
    <td><?php echo $row['cpf']; ?></td>
    <td><?php echo $row['telefone']; ?></td>
    <td><?php echo $row['valor']; ?></td>
    <td><?php echo $row['parc']; ?></td>
	<td><?php echo $row['status']; ?></td>
    <td><?php echo "<a href='deleteexcecoes.php?&id=".$row['ID']."'onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">  Excluir</a>"; ?></td>
	<td><?php echo "<a href='editarexcecoes.php?&id=".$row['ID']."'> Editar</a>"; ?></td>
 <?php 
endwhile ; 
 ?>   
</table>
<button  class="btn btn-danger" Onclick="doCsv()">
Download em CSV
</button>
<script>
	function doCsv() {
		var table = document.getElementById("cliente").innerHTML;
		var data = table.replace(/<thead>/g, '')
		.replace(/<\/thead>/g, '')
		.replace(/<tbody\>/g, '')
		.replace(/<\/tbody>/g, '')
		.replace(/<tr>/g, '')
		.replace(/<\/tr>/g, '\r\n')
		.replace(/<td>/g, '')
		.replace(/<\/td>/g, ';')
		.replace(/\t/g, '')
		.replace(/\n/g, '');
				
		var myLink = document.createElement('a');
		myLink.download = 'Controle.csv';
		myLink.href = 'data:application/csv,' + escape(data);
		myLink.click();
		
	}
</script>
<button><a href="postlogin.php" class="btn btn-danger">Voltar!</a></button>
&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; <button class="btn btn-danger" onclick="funcao1()">Limpar Tabela toda!</button>
<p id="demo"></p>
<script>
function funcao1()
{
var x;
var r=confirm("Tem Certeza que deseja Limpar a Tabela ?!");
if (r==true)
  {
window.location.href='deleteexcecoescompleto.php'
  }
else
  {
  x="Você Cancelou a Exclusão de tudo ;) ";
  }
document.getElementById("demo").innerHTML=x;
}
</script>

</body>
</html>