<?php
	include('exchanger.php');
	// Creamos la tabla con el tipo de moneda base 
	$currencyTable = new exchanger("DOP");

	// Agregamos variost tipos de moneda
	$currencyTable->addCurrency("USD");
	$currencyTable->addCurrency("EUR");
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exchanger</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">Currency exchanger</h3>
      </div>
      
      <div class="row">
      	<div class="col-md-12">
      		<?php $currencyTable->display(); ?>
      	</div>
      </div>


      <footer class="footer">
        <p>© Argenis S&aacute;nchez 2014</p>
      </footer>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body>

 <!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Page main JavaScript -->
<script src="js/main.js"></script>

<!-- Location picker plugin -->
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script src="js/locationpicker.jquery.js"></script>

<!-- Dialog plugin JavaScript -->
<script src="js/dialog/bootstrap-dialog.min.js"></script>
<link href="js/dialog/bootstrap-dialog.min.css" rel="stylesheet">

<!-- Datatables plugin JavaScript -->
<script src="js/datatables/jquery.dataTables.min.js"></script>
<link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet">    

<script  src = 'jquery.js'></script>
<script type = 'text/javascript'>
	$(document).ready(function()
	{
		
	});
</script>

