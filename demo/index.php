<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/rzerogooglechartbuilder.min.js"></script>
	<title>RZERO Google Charts Builder - Testing</title>
</head>
<body>
	<div class="container">
		<h1 class="text-center">RZERO Google Charts Builder demonstration</h1>
		<div class="col-xs-12 col-md-12">
			Gráfica de barras
			<div id="bar-chart" data-graphictype="BubbleChart" data-urldata="data/getdata.php"></div>
		</div>
	</div>
	<script>
		google.load('visualization', '1.0', {packages:['corechart']});
		
		$(document).ready(function(){
			$("#bar-chart").gchart_make_chart('Le grafica', undefined, '100%');
		});
	</script>
</body>
</html>