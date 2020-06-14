<?php $painel_atual = "controle"; ?>
<?php require "../topo.php"; ?>
<?php require "../config.php"; ?>

<div class="row ">
	<div class="col-2">
		<h5 >Olá, <?php echo $nome ?> <h5>
		</br>
	</div>
	<div class="col-8">
		<h5 >Controle de Búfalos<h5>
		</br>
	</div>
	<div class ="col-1 d-flex justify-content-end">
		<a  href="../estatisticas"> <button type="button" class="btn btn-info">Estatísticas</button></a>
		</br>
	</div>
	<div class ="col-1 d-flex justify-content-end">
		<a  href="../config.php?acao=quebra"> <button type="button" class="btn btn-secondary">Sair</button></a>
		</br>
	</div>
	
</div>

<div class="row">
	<div class="col-12 col-md-6 ">
		<form method="post" action="" enctype="multipart/form-data">
			<div class="input-group mb-3">
				<input type="text" class="form-control" name = "info" placeholder="PESQUISAR POR ANIMAL">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="submit" name="pesquisa">Pesquisar</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-12 col-md-3 ">
		<form method="post" action="" enctype="multipart/form-data">
			<button class = "btn btn-success btn-block"type="submit" value="ENVIAR"name="total">Visualizar todos os animais</button>
		</form>
	</div>
	<div class="col-12 col-md-3 ">
		<form method="post" action="" enctype="multipart/form-data">
			<button class = "btn btn-success btn-block"type="submit" value="ENVIAR"name="cadastro">Cadastrar novo animal</button>
		</form>
	</div>
</div>

<?php///////////////////////////////////////PESQUISAR//////////////////////////////////////////////////////////?>

<?php
if(isset($_POST['pesquisa'])){
	$info = $_POST['info'];
	if($info == ''){
		echo "<script language='javascript'> window.alert('Por favor, digite os dados para pesquisar');</script>";
	}else{
		$sql = "SELECT * FROM bufalos WHERE  nome = '$info' OR nasc_ano = '$info' OR brinco = '$info' ";
		$result = mysqli_query($conexao, $sql);
		if(mysqli_num_rows($result) <= 0){
			echo "<br><h3 class='text-center'> Animal não Encontrado, verifique a informação inserida! </h2>";
		}else{
			while($res_1 = mysqli_fetch_assoc($result)){
				$nome = $res_1['nome'];
				$brinco = $res_1['brinco'];
				$nasc_ano = $res_1['nasc_ano'];
				$nasc_mes = $res_1['nasc_mes'];
				$nasc_dia = $res_1['nasc_dia'];
				$raca = $res_1['raca'];
				$produz_leite = $res_1['produz_leite'];

				echo('<h6>Nº do Brinco: '); echo $brinco;echo('  </h6>'); 
				echo('<p>Nome: '); echo $nome; echo('</p>');
				echo('<p>Raça: '); echo $raca; ('</p>');
				echo('<p>Ano de nascimento: '); echo $nasc_ano; ('</p>');
				echo('<p>Dia de nascimento: '); echo $nasc_dia; ('</p>');
				echo('<p>Mes de nascimento: '); echo $nasc_mes; ('</p>');
				echo('<p>Produz Leite: '); echo $produz_leite; ('</p>');
				echo('</br>');
				echo('<a href="index.php?pg=editar&brinco=');echo $brinco; echo('"><button type="button" class="btn btn-primary btn-sm">Editar</button></a> ');
				echo('<a href="index.php?pg=exame&brinco=');echo $brinco; echo('"><button type="button" class="btn btn-warning btn-sm">Exame</button></a> ');
				echo('<a href="index.php?pg=excluir&brinco=');echo $brinco; echo('"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a> ');
				echo('</br></br>');
			}
		}		
	}   
} 
?>
<?php/////////////////////////////////////////////////////////////////////////////////////////////////?>

<?php///////////////////////////////////TOTAL//////////////////////////////////////////////////////////////?>

<?php
if(isset($_POST['total'])){

	$sql = "SELECT * FROM bufalos";
	$result = mysqli_query($conexao, $sql);
	if(mysqli_num_rows($result) <= 0){
		echo "<br><h3 class='text-center'> Sem animais cadastrados </h2>";
	}else{
		while($res_1 = mysqli_fetch_assoc($result)){
			$nome = $res_1['nome'];
			$brinco = $res_1['brinco'];
			$nasc_ano = $res_1['nasc_ano'];
			$nasc_dia = $res_1['nasc_dia'];
			$nasc_mes = $res_1['nasc_mes'];
			$raca = $res_1['raca'];
			$produz_leite = $res_1['produz_leite'];

			echo('<h6>Nº do Brinco: '); echo $brinco;echo('  </h6>'); 
			echo('<p>Nome: '); echo $nome; echo('</p>');
			echo('<p>Raça: '); echo $raca; ('</p>');
			echo('<p>Ano de nascimento: '); echo $nasc_ano; ('</p>');
			echo('<p>Dia de nascimento: '); echo $nasc_dia; ('</p>');
			echo('<p>Mes de nascimento: '); echo $nasc_mes; ('</p>');
			echo('<p>Produz Leite: '); echo $produz_leite; ('</p>');
			echo('</br>');
			echo('<a href="index.php?pg=editar&brinco=');echo $brinco; echo('"><button type="button" class="btn btn-primary btn-sm">Editar</button></a> ');
			echo('<a href="index.php?pg=exame&brinco=');echo $brinco; echo('"><button type="button" class="btn btn-warning btn-sm">Exame</button></a> ');
			echo('<a href="index.php?pg=excluir&brinco=');echo $brinco; echo('"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a> ');
			echo('</br></br>');
		}		
	}   
} 
?>

<?php/////////////////////////////////////////////////////////////////////////////////////////////////?>

<?php///////////////////////////////////CADASTRAR//////////////////////////////////////////////////////////////?>

<?php  
if(isset($_POST['cadastro'])){
?>
	<div>
	</br>
		<h5 class="text-align-center">Cadastrar animal</h5>
		<form method="post" action="" enctype="multipart/form-data">
			<input type="text" name="nome" placeholder="Nome">
			<input type="text" name="brinco" placeholder="Brinco">
			<input type="text" name="raca" placeholder="Raça">
			<select name="nasc_dia" >
				<option value="0">Nascimento Dia</option>
				<?php for ($i = 1; $i <= 31; $i++){?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php };?>
			</select>
			<select name="nasc_mes" >
				<option value="1">Nascimento Mês</option>
				<option value="Jan">Janeiro</option>
				<option value="Fev">Fevereiro</option>
				<option value="Mar">Março</option>
				<option value="Abr">Abril</option>
				<option value="Mai">Maio</option>
				<option value="Jun">Junho</option>
				<option value="Jul">Julho</option>
				<option value="Ago">Agosto</option>
				<option value="Set">Setembro</option>
				<option value="Out">Outubro</option>
				<option value="Nov">Novembro</option>
				<option value="Dez">Dezembro</option>
			</select>
			<select name="nasc_nao" >
				<option value="0">Nascimento Ano</option>
				<?php for ($i =  date("Y"); $i >= 2000; $i--){?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php };?>
			</select>
			<input type="text" name="b_mae" placeholder="Brinco da mãe">
			<select name="produz_leite" >
				<option value="1">Produz Leite</option>
				<option value="Sim">Sim</option>
				<option value="Nao">Não</option>
			</select>
			<button class = "btn btn-primary"type="submit" value="ALTERAR"name="cadastrar">Cadastrar</button>
		</form>
	</div>
<?php 
}
if(isset($_POST['cadastrar'])){

	$nome = $_POST['nome'];
	$raca = $_POST['raca'];
	$nasc_ano = $_POST['nasc_ano'];
	$nasc_dia = $_POST['nasc_dia'];
	$nasc_mes = $_POST['nasc_mes'];
	$b_mae = $_POST['b_mae'];
	$brinco = $_POST['brinco'];
	$produz_leite = $_POST['produz_leite'];

	if(($produz_leite == 1)){
		echo "<script language='javascript'> window.alert('Campo Produz Leite incorreto ');</script>";
		exit();
	}
	if (($nome == '')||($raca == '')||($nasc_ano == '0')||($nasc_dia == '0')||($nasc_mes == '1')||($b_mae == '')||($brinco == '')){
		echo "<script language='javascript'> window.alert('Por favor, digite os dados do animal novo');</script>";
	}else{
		$sql = "INSERT INTO `bufalos`(`brinco`, `nome`, `nasc_ano`, `nasc_dia`, `nasc_mes`, `brinco_mae`, `raca`, `produz_leite`) VALUES ($brinco,'$nome',$nasc_ano,$nasc_dia,$nasc_mes,$b_mae,'$raca','$produz_leite')";
		$result = mysqli_query($conexao, $sql);
		
		if($result == ''){
			echo "<script language='javascript'> window.alert('Animal NÃO cadastrado no registro');</script>";
			echo "<script language='javascript'> window.location='index.php';</script>";
		}else{
			echo "<script language='javascript'> window.alert('Animal cadastrado no registro');</script>";
			echo "<script language='javascript'> window.location='index.php';</script>";
		}
	}
}
?>

<?php/////////////////////////////////////////////////////////////////////////////////////////////////?>

<?php///////////////////////////////////EXCLUIR//////////////////////////////////////////////////////////////?>

<?php  
if(@$_GET['pg'] == 'excluir'){
	$brinco = $_GET['brinco'];
	$sql ="DELETE FROM `bufalos` WHERE `bufalos`.`brinco` = $brinco";
	mysqli_query($conexao, $sql);
	echo "<script language='javascript'> window.alert('Animal deletado do registro');</script>";
	echo "<script language='javascript'> window.location='index.php';</script>";
}
?>

<?php/////////////////////////////////////////////////////////////////////////////////////////////////?>

<?php///////////////////////////////////EDITAR//////////////////////////////////////////////////////////////?>

<?php  
if(@$_GET['pg'] == 'editar'){
	$brinco = $_GET['brinco'];
?>
	</br>
		<p class="text-align-center">Alterar dados do animal com brinco: <strong><?php echo $brinco ?></strong> </p>
	<form method="post" action="" enctype="multipart/form-data">
	<input type="text" name="nome" placeholder="Nome">
			<input type="text" name="brinco" placeholder="Brinco">
			<input type="text" name="raca" placeholder="Raça">
			<select name="nasc_dia" >
				<option value="0">Nascimento Dia</option>
				<?php for ($i = 1; $i <= 31; $i++){?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php };?>
			</select>
			<select name="nasc_mes" >
				<option value="1">Nascimento Mês</option>
				<option value="Jan">Janeiro</option>
				<option value="Fev">Fevereiro</option>
				<option value="Mar">Março</option>
				<option value="Abr">Abril</option>
				<option value="Mai">Maio</option>
				<option value="Jun">Junho</option>
				<option value="Jul">Julho</option>
				<option value="Ago">Agosto</option>
				<option value="Set">Setembro</option>
				<option value="Out">Outubro</option>
				<option value="Nov">Novembro</option>
				<option value="Dez">Dezembro</option>
			</select>
			<select name="nasc_nao" >
				<option value="0">Nascimento Ano</option>
				<?php for ($i =  date("Y"); $i >= 2000; $i--){?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php };?>
			</select>
			<input type="text" name="b_mae" placeholder="Brinco da mãe">
			<select name="produz_leite" >
				<option value="1">Produz Leite</option>
				<option value="Sim">Sim</option>
				<option value="Nao">Não</option>
			</select>
		<button class = "btn btn-primary"type="submit" value="ALTERAR"name="alterar">Alterar</button>
	</form>
<?php 
}
		if(isset($_POST['alterar'])){
			$nome = $_POST['nome'];
			$raca = $_POST['raca'];
			$nasc_ano = $_POST['nasc_ano'];
			$nasc_dia = $_POST['nasc_dia'];
			$nasc_mes = $_POST['nasc_mes'];
			$b_mae = $_POST['b_mae'];
			$produz_leite = $_POST['produz_leite'];

			if(($produz_leite == 1)){
				echo "<script language='javascript'> window.alert('Campo Produz Leite incorreto ');</script>";
				exit();
			}
			if(($nome == '')||($raca == '')||($nasc_ano == '0')||($nasc_ano == '0')||($nasc_ano == '0')||($b_mae == '')){
				echo "<script language='javascript'> window.alert('Por favor, digite os dados para serem alterados');</script>";
			}else{
				$sql = "UPDATE `bufalos` SET nome ='$nome',nasc_ano =$nasc_ano, nasc_dia =$nasc_dia ,nasc_mes =$nasc_mes, brinco_mae =$b_mae, raca= '$raca', produz_leite='$produz_leite' WHERE brinco =$brinco";
				$result = mysqli_query($conexao, $sql);
				echo "<script language='javascript'> window.alert('Animal atualizado do registro');</script>";
				echo "<script language='javascript'> window.location='index.php';</script>";
			}
		}
?>

<?php/////////////////////////////////////////////////////////////////////////////////////////////////?>


  <?php require "../rodape.php"; ?>


