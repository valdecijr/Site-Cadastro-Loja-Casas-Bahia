<!DOCTYPE html>
<html lang="en">
<head>
	<script language="JavaScript">
    function protegercodigo() {
    if (event.button==2||event.button==3){
        alert('Sai fora curioso ;)!');}
    }
    document.onmousedown=protegercodigo
</script>
	<meta charset="utf-8">
	<title>Formulario Deacts</title>
<link rel="icon" type="image/png" href="deacts.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/animate.min.css">
	<link rel="stylesheet" href="../css/et-line-font.css">
	<link rel="stylesheet" href="../css/nivo-lightbox.css">
	<link rel="stylesheet" href="../css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/login.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    
 
<script type="text/javascript">
function validaCampo()
{
if(document.cadastro.cpf.value=="")
	{
	alert("O Campo CPF é obrigatório!");
	return false;
	}
else
	if(document.cadastro.nome.value=="")
	{
	alert("O Campo Nome do Cliente negociados é obrigatório!");
	return false;
	}
else
	if(document.cadastro.voriginal.value=="")
	{
	alert("O Campo Valor Original é obrigatório!");
	return false;
	}
else
	if(document.cadastro.vatualizado.value=="")
	{
	alert("O Campo Valor Atualizado é obrigatório!");
	return false;
	}
else
	if(document.cadastro.maioratraso.value=="")
	{
	alert("O Campo Maior Atraso é obrigatório!");
	return false;
	}
else
	if(document.cadastro.menoratraso.value=="")
	{
	alert("O Campo Menor Atraso é obrigatório!");
	return false;
	}
else
	if(document.cadastro.pgto.value=="")
	{
	alert("O Campo Pagamento é obrigatório!");
	return false;
	}
else
	if(document.cadastro.vproposta.value=="")
	{
	alert("O Campo Valor da Proposta é obrigatório!");
	return false;
	}
else
	if(document.cadastro.dvencimento.value=="")
	{
	alert("O Campo Data Vencimento: é obrigatório!");
	return false;
	}
else
	if(document.cadastro.logineasy.value=="")
	{
	alert("O Campo Operador é obrigatório!");
	return false;
	}	
else
return true;
}
<!-- Fim do JavaScript que validará os campos obrigatórios! -->
</script> 
</head>
<body >

<!-- preloader section -->
 <?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:error.html');

	}
	
$id = $_GET['id'];
$connect = mysql_connect('127.0.0.1:3306','root','');
$db = mysql_select_db('deacts');
$tt = mysql_query("SELECT * FROM clientes where ID = '$id' ");
$row = mysql_fetch_assoc($tt);

?>
<!-- navigation section -->
<section class=" navbar-fixed-top navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span></button>
            </div>
            <div class="col-md-12 col-sm-12">
			<a href="controleexcecoes.php" class="navbar-brand smoothScroll">Grupo Talentos</a>  
			
		</div>
			</div>
		
	
	
</section>	
<br>
<br>
<br>
<div class="text-center">
		<div class="">
			<div class="col-sm-12">
				<h1>Edite seu Cliente!</h1>
							
			</div>
		</div>
	</div>
<div>	
<form id="cadastro" name="cadastro" method="post" action="updateexcecoes.php" onsubmit="return validaCampo(); return false;">
  <table width="625" border="0">
    <tr>
	  <input name="id" type="hidden" id="id" size="70" maxlength="60" value="<?php echo $row['ID']; ?>"/>  
      <td>CPF ou CNPJ:</td>
      <td><input name="cpf" class="form-control" type="text" id="cpf" size="70" maxlength="70" value="<?php echo $row['cpf']; ?>" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td width="69">Nome do Cliente:</td>
      <td width="546"><input name="nome" class="form-control" type="text" id="nome" size="70" maxlength="60" value="<?php echo $row['nome']; ?>" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Valor Original da Dívida:</td>
      <td><input name="voriginal" class="form-control" type="text" id="voriginal" maxlength="20" value="<?php echo $row['voriginal']; ?>" />
        <span class="style1">*</span></td>
    </tr>
	<tr>
      <td>Valor Atualizado:</td>
      <td><input name="vatualizado" class="form-control" type="text" id="vatualizado" maxlength="20" value="<?php echo $row['vatualizado']; ?>" />
        <span class="style1">*</span></td>
    </tr>
	<tr>
      <td>Maior Atraso:</td>
      <td><input name="maioratraso" class="form-control" type="text" id="maioratraso" value="<?php echo $row['maioratraso']; ?>" />
        <span class="style1">*</span></td>
    </tr>
	<tr>
      <td>Menor Atraso:</td>
      <td><input name="menoratraso" class="form-control" type="text" id="menoratraso" maxlength="20" value="<?php echo $row['menoratraso']; ?>" />
        <span class="style1">*</span></td>
    </tr>
	<tr>
      <td>Forma de Pgto:</td>
      <td> <select name="pgto" class="form-control" id="pgto" >
		<option value="<?php echo $row['pgto']; ?>"><?php echo $row['pgto']; ?></option>
		<option>Selecione...</option>
        <option value="A Vista">A Vista</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
          </select>
        <span class="style1">*</span></td>
    </tr>
	<tr>
      <td>Valor da Proposta:</td>
      <td><input name="vproposta" class="form-control" type="text" id="vproposta" maxlength="20" value="<?php echo $row['vproposta']; ?>" />
        <span class="style1">*</span></td>
    </tr>
	<tr>
      <td>Data Vencimento:</td>
      <td><input name="dvencimento" class="form-control" type="text" id="dvencimento" maxlength="20" value="<?php echo $row['dvencimento']; ?>" />
        <span class="style1">*</span></td>
    </tr>
	<tr>
      <td>Operador:</td>
      <td><input name="logineasy" class="form-control" type="text" id="logineasy" maxlength="20" value="<?php echo $row['logineasy']; ?>" />
        <span class="style1">*</span></td>
    </tr>
	<tr>
      <td>Status:</td>
      <td><input name="status" class="btn-default btn" type="text" id="status" maxlength="50" value="<?php echo $row['status']; ?>" />
        <span class="style1">*</span></td>
    </tr>
	<tr>
     <tr>
      <td colspan="2"><p>
        <input name="cadastrar" class="form-control" type="submit" id="cadastrar" value="Concluir meu Cadastro!" /> 
        <br/>
          <input name="limpar" class=" btn btn-danger" type="reset" id="limpar" value="Limpar Campos preenchidos!" />
          <br />
          <span class="style1">* Campos com * são obrigatórios!          </span></p>
      <p>&nbsp; </p></td>
    </tr>
  </table>
</form>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Copyright © Grupo Talentos | Developer: Bruno Santos - @Elbrono</a></p>
               	<hr>
				<ul class="social-icon">
				 
					<img src="deacts.png" width="83" height="78" alt=""/>
				</ul>
			</div>
		</div>
	</div>
</footer>

	</div>
</section>
</body>
</html>