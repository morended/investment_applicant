<?php include("inc/header.php"); 
include_once("checkSession.php");
?>
<head>
<title>Charts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Stock Guru</title>
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Exo:900' rel='stylesheet' type='text/css'>
</head>
    <div id="wrapper">
   
	<div class="container clearfix">
	
	<div class="grid_3"><a href="#yahoo">YHOO</a>
	<a href="#google">GOOG</a>
	<a href="#microsoft">MSFT</a>
	<a href="#amazon">AMZN</a>
	<a href="#bank">BAC</a></div>
	<a name="yahoo" ><iframe class="grid_12 omega" src="
	graphnew.php?q=1" width="1000" height="600" frameborder="0"></iframe></a>
	
	<div class="grid_3">
	<a href="#yahoo">YHOO</a>
	<a href="#google">GOOG</a>	
	<a href="#microsoft">MSFT</a>
	<a href="#amazon">AMZN</a>
	<a href="#bank">BAC</a></div>
	<a name="google" ><iframe class="grid_12 omega" src="
	graphnew.php?q=2" width="1000" height="600" frameborder="0"></iframe></a>
	
	<div class="grid_3"><a href="#yahoo">YHOO</a>
	<a href="#google">GOOG</a>
	<a href="#microsoft">MSFT</a>
	<a href="#amazon">AMZN</a>
	<a href="#bank">BAC</a></div>
	<a name="microsoft" ><iframe class="grid_12 omega" src="graphnew.php?q=3" width="1000" height="600" frameborder="0"></iframe></a>
	
	<div class="grid_3"><a href="#yahoo">YHOO</a>
	<a href="#google">GOOG</a>
	<a href="#microsoft">MSFT</a>
	<a href="#amazon">AMZN</a>
	<a href="#bank">BAC</a></div>
	<a name="amazon" ><iframe class="grid_12 omega" src="graphnew.php?q=4" width="1000" height="600" frameborder="0"></iframe></a>
	
	<div class="grid_3"><a href="#yahoo">YHOO</a>
	<a href="#google">GOOG</a>
	<a href="#microsoft">MSFT</a>
	<a href="#amazon">AMZN</a>
	<a href="#bank">BAC</a></div>
	<a name="bank" ><iframe class="grid_12 omega" src="graphnew.php?q=5" width="1000" height="600" frameborder="0"></iframe></a>
	
	<div class="grid_12 omega" id="txtchart" align="justify"><b></b></div>
		


    </div>
  </body>
</html>
<?php include("inc/footer.php"); ?>
