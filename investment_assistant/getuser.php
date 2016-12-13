<?php
 include("inc/header.php");
$p=$_GET["symbol"];
$q=$_GET["prices"];
$fromDate=$_GET["fromDate"];
$toDate=$_GET["toDate"];

require_once 'login.php';  
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) die($conn->connect_error);
if($p==1)
$compname='YHOO';
if($p==2)
$compname='GOOG';
if($p==3)
$compname='MSFT';
if($p==4)
$compname='AMZN';
if($p==5)
$compname='BAC';


if($q==1){
	$sql="SELECT symbol,lastvalue FROM live_data WHERE symbol='$compname'"; 
	
	
	$result = $conn->query($sql);  
	$rows = $result->num_rows;

   if (!$result) die ("Database access failed: " . $conn->error); 
	echo "<table class='tableuser' border='1'>
	<tr>
	<th>Symbol</th>
	<th>Latest Value</th>
	</tr>";

	for ($j = 0 ; $j < $rows ; ++$j)  { 
		$result->data_seek($j); 
	  $row = $result->fetch_array(MYSQLI_NUM);
	  echo "<tr>";
	  echo "<td>" . $row[0] . "</td>";
	  echo "<td>" . $row[1] . "</td>";
	  echo "</tr>";
	  }
	  echo "</table>";
	  

}


if($q==2){
	$sql="SELECT symbol, AVG(close) FROM historic_data WHERE symbol = '".$compname."' AND (date > STR_TO_DATE('$fromDate', '%Y-%m-%d') AND date < STR_TO_DATE('$toDate', '%Y-%m-%d'))";
	
	$result = $conn->query($sql);  
	$rows = $result->num_rows; 

	 
   if (!$result) die ("Database access failed: " . $conn->error);
	echo "<table class='tableuser' border='1'>
	<tr>
	<th>Symbol</th>
	<th>Average Value</th>
	</tr>";

	 for ($j = 0 ; $j < $rows ; ++$j)  { 
		$result->data_seek($j);
		
	  $row = $result->fetch_array(MYSQLI_NUM);
	  
	  echo "<tr>";
	  echo "<td>" . $row[0] . "</td>";
	  echo "<td>" . $row[1] . "</td>";
	  echo "</tr>";
	  }
	  echo "</table>";
	  
}


if($q==3){
	$sql="SELECT symbol, MAX(close) FROM historic_data WHERE Symbol='".$compname."' AND date > STR_TO_DATE('$fromDate', '%Y-%m-%d') AND date < STR_TO_DATE('$toDate', '%Y-%m-%d')";
	
	
	$result = $conn->query($sql);  
		$rows = $result->num_rows;
   if (!$result) die ("Database access failed: " . $conn->error);
	echo "<table  class='tableuser' border='1'>
	<tr>
	<th>Symbol</th>
	<th>Maximum Value</th>
	</tr>";

	for ($j = 0 ; $j < $rows ; ++$j)  { 
		$result->data_seek($j); 
	  $row = $result->fetch_array(MYSQLI_NUM);
	  echo "<tr>";
	  echo "<td>" . $row[0] . "</td>";
	  echo "<td>" . $row[1] . "</td>";
	  echo "</tr>";
	  }
	  echo "</table>";
	  
}

if($q==4){
	$sql="SELECT symbol, MIN(close) FROM historic_data WHERE symbol='".$compname."' AND date > STR_TO_DATE('$fromDate', '%Y-%m-%d') AND date < STR_TO_DATE('$toDate', '%Y-%m-%d')";
	
	
	$result = $conn->query($sql);
	$rows = $result->num_rows;	
   if (!$result) die ("Database access failed: " . $conn->error);
	echo "<table class='tableuser' border='1'>
	<tr>
	<th>Symbol</th>
	<th>Minimum Value</th>
	</tr>";

	for ($j = 0 ; $j < $rows ; ++$j)  { 
		$result->data_seek($j); 
	  $row = $result->fetch_array(MYSQLI_NUM);
	  echo "<tr>";
	  echo "<td>" . $row[0] . "</td>";
	  echo "<td>" . $row[1] . "</td>";
	  echo "</tr>";
	  }
	  echo "</table>";
}


?>