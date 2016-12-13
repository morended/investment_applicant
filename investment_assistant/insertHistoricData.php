<?php
//
// Takes in a symbol and a date;
// returns the Yahoo Finance Historical data for that single date
// If there's no data, the array is empty.
//
require_once 'login.php';  
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) die($conn->connect_error);
 $query = "CREATE TABLE IF NOT EXISTS historic_data (   
  id SMALLINT NOT NULL AUTO_INCREMENT,  
 symbol VARCHAR(10) NOT NULL, 
	DATE date,  
  open float(8,2), 
  high float(8,2),
	low float(8,2),
	close float(8,2),
	volume float(18,2),   
  PRIMARY KEY (id)
  )";
 
   $result = $conn->query($query);  
   if (!$result) die ("Database access failed: " . $conn->error); 
	$url=array();
		$url['YHOO'] = "http://ichart.finance.yahoo.com/table.csv?s=YHOO&a=11&b=11&c=2015&d=11&e=20&f=2016&g=d&ignore=.csv";
        $url['GOOG'] = "http://ichart.finance.yahoo.com/table.csv?s=GOOG&a=11&b=11&c=2015&d=11&e=20&f=2016&g=d&ignore=.csv";
        $url['MSFT'] = "http://ichart.finance.yahoo.com/table.csv?s=MSFT&a=11&b=14&c=2015&d=11&e=20&f=2016&g=d&ignore=.csv";
        $url['AMZN'] = "http://ichart.finance.yahoo.com/table.csv?s=AMZN&a=11&b=14&c=2015&d=11&e=20&f=2016&g=d&ignore=.csv";
        $url['BAC'] = "http://ichart.finance.yahoo.com/table.csv?s=BAC&a=11&b=14&c=2015&d=11&e=20&f=2016&g=d&ignore=.csv";
            $query = "DELETE from historic_data";
  $result = $conn->query($query);  
   if (!$result) die ("Database access failed: " . $conn->error); 

  
  foreach($url as $key => $value){
	  $return_data = @file_get_contents($value);
  $parts       = explode("\n", $return_data);
  $count=0;
  $eachrow='';
 
 foreach($parts as $row) {
	 if($count>0){
	 $eachrow= explode(",", $row);
	 if(isset($eachrow[1]))$row1 = floatval(str_replace(',', '.', $eachrow[1]));
	 if(isset($eachrow[2]))	 $row2 = floatval(str_replace(',', '.', $eachrow[2]));
	 	 if(isset($eachrow[3])) $row3 = floatval(str_replace(',', '.', $eachrow[3]));
	 	 if(isset($eachrow[4])) $row4 = floatval(str_replace(',', '.', $eachrow[4]));
	 	 if(isset($eachrow[5])) $row5 = floatval(str_replace(',', '.', $eachrow[5]));
		 if(isset($eachrow[6])) $row6 = $eachrow[0];
		 
	  $query = "INSERT INTO historic_data(id,symbol,date,open,high,low,close,volume) VALUES(NULL,'$key' , STR_TO_DATE('$row6', '%Y-%m-%d'), $row1,$row2,$row3,$row4,$row5)"; 
	 $result = $conn->query($query);  
if (!$result) die ("Database access failed: " . $conn->error);
	 }
	 $count++;
	 
 }
  }



?>