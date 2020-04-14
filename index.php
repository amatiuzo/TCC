<?php require "topo.php"; ?>
<?php require "conexao.php"; ?>


<?php
	if(isset($_POST['button'])){
		$code = $_POST['code'];
		$password = $_POST['password'];
		if($code == ''){
			echo "<script language='javascript'> window.alert( 'Por favor, digite o login acesso!' );</script>";
			}else if($password == ''){
				echo "<script language='javascript'> window.alert( 'Por favor, digite sua senha!' );</script>";		
		} else{
			$sql = "SELECT * FROM login WHERE code = '$code' AND senha = '$password'";
			$result = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($result) > 0){
				while($res_1 = mysqli_fetch_assoc($result)){
					$status = $res_1['status'];
					$code = $res_1['code'];
					$senha = $res_1['senha'];
					$nome = $res_1['nome'];
					$painel = $res_1['painel'];
					if($status == 'Inativo'){
						echo "<script language='javascript'> window.alert( 'Você está inativo, procure a administração!!' );</script>";
					}else{
						session_start();
						$_SESSION['code'] = $code;
						$_SESSION['nome'] = $nome;
						$_SESSION['senha'] = $senha;
						$_SESSION['painel'] = $painel;
						if($painel == 'admin'){
							echo "<script language='javascript'> window.location='admin';</script>";	
							
						} else if($painel == 'aluno'){
							echo "<script language='javascript'> window.location='aluno';</script>";	
						}else if($painel == 'professor'){
							echo "<script language='javascript'> window.location='professor';</script>";	
						}else if($painel == 'controle'){
							echo "<script language='javascript'> window.location='controle';</script>";	
						}else if($painel == 'tesouraria'){
							echo "<script language='javascript'> window.location='tesouraria';</script>";	
						}
							
					}
					
				}
				
			} else{
				echo "<script language='javascript'> window.alert( 'Dados Incorretos' );</script>";
			}
		}
	}
	?>

	<?php/////////////////////////////////////////////////////////////////////////////////////////////////?>
		<div class="row">
		
			<div class = "col-12 ">
				<h3  class="d-flex justify-content-center .espaço50">Sistema Igatu</h3>
				</br>
				<form class="d-flex justify-content-center " name="form" method="post" action="" enctype="multipart/form-data">

				<table>
					<tr>
						<td><h5>Login:</h5></td>
					</tr>
					<tr>
						<td><input type="text" name="code" /></td>
					</tr>
					<tr>
						<td><h5>Senha:</h5></td>
					</tr>
					<tr>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td><input class="input btn btn-primary btn-block" type="submit" name="button" value="Entrar" /></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
	

</body>
</html>