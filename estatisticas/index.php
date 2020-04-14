<?php $painel_atual = "estatisticas"; ?>
<?php require "../topo.php"; ?>
<?php require "../config.php"; ?>

<div class="row ">
	<div class="col-2">
		<h5 >Olá, <?php echo $nome ?> <h5>
		</br>
	</div>
	<div class="col-6">
		<h5 >Estatísticas<h5>
		</br>
	</div>
	<div class ="col-3 d-flex justify-content-end">
		<a  href="../controle"> <button type="button" class="btn btn-info">Controle de Búfalos</button></a>
		</br>
	</div>
	<div class ="col-1 d-flex justify-content-end">
		<a  href="../config.php?acao=quebra"> <button type="button" class="btn btn-secondary">Sair</button></a>
		</br>
	</div>
</div>
<?php///////////////////////////////////////////////////////////////////////////////////////////////////?>
<?php
	$sql = "SELECT * FROM bufalos";
	$result = mysqli_query($conexao, $sql);
	if(mysqli_num_rows($result) <= 0){
		echo "<br><h3 class='text-center'> Sem animais cadastrados </h2>";
	}else{
		$sim_leite = 0;
		$nao_leite = 0;
		while($res_1 = mysqli_fetch_assoc($result)){
			$nome = $res_1['nome'];
			$brinco = $res_1['brinco'];
			$nasc_ano = $res_1['nasc_ano'];
			$nasc_dia = $res_1['nasc_dia'];
			$nasc_mes = $res_1['nasc_mes'];
			$raca = $res_1['raca'];
			$produz_leite = $res_1['produz_leite'];

			if($produz_leite == 'Sim'){
				$sim_leite++;
			}
			else{
				$nao_leite++;
			}
		}
	}
?>

<div>
	<div id="piechart" style="width: 900px; height: 500px;"></div>
</div>






<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Produz Leite', 'Quantidade'],
          ['Sim',     <?php echo $sim_leite ?>],
          ['Não',     <?php echo $nao_leite ?>],
        ]);

        var options = {
          title: 'Grafico Quantidade de Bufalas que dão leite'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<?php require "../rodape.php"; ?>
