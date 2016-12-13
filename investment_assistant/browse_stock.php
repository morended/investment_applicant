<?php include("inc/header.php"); 
include_once("checkSession.php");
?>

    <div id="wrapper">

      <section id="primary">

      <h3>Browse Stock Prices</h3>
      <form name="form2" method="get" action="getuser.php">

  		Select Stock Symbol: <select name="symbol" font face="Nunito">
  			<option value="">----------</option>
  			<option value="1">YHOO</option>
  			<option value="2">GOOG</option>
  			<option value="3">MSFT</option>
  			<option value="4">AMZN</option>
  			<option value="5">BAC</option>
  		</select><br>
  		<br/>

  		Price Value: <select name="prices" id="selectOpt" font face="Nunito" onchange="hideDate();">
  			<option value="">-----------------------</option>
  			<option value="1">Latest Price</option>
  			<option value="2">Average Price</option>
  			<option value="3">Maximum Price</option>
  			<option value="4">Minimum Price</option>
  		</select> <br/>
  		<br/>
  		
		<div id="fromDate">From:<input type="date" name="fromDate"></div><br>
		<div id="toDate">To:<input type="date" name="toDate"></div>
  		<br/>
  		<input class="btn-small" name="Submit" type="submit" value="Submit">
  		</form>

      </section>

    </div>

    <section id="secondary">

      <img src="img/stock.png" alt="The Stock Market" height="400" width="600" />

    </section>

  </body>
  <script>
  function hideDate(){

	  var myselect = document.getElementById("selectOpt").value;
	 
	  if(myselect==1){
		
		document.getElementById("fromDate").style.display='none';
		document.getElementById("toDate").style.display='none';
	  }
	  else{
		  document.getElementById("fromDate").style.display='block';
		document.getElementById("toDate").style.display='block';
	  }
	  
  }
  </script>
</html>

<?php include("inc/footer.php"); ?>
