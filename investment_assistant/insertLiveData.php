<?php
//
// Takes in a symbol and a date;
// returns the Yahoo Finance Historical data for that single date
// If there's no data, the array is empty.
//
require_once 'login.php';  
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) die($conn->connect_error);
 $query = "CREATE TABLE IF NOT EXISTS live_data (   
  id SMALLINT NOT NULL AUTO_INCREMENT,  
 symbol VARCHAR(10) NOT NULL,
	lastvalue float(8,2),
	date date,
	lcltime varchar(15),
	chnge float(8,2),
	openvalue float(8,2), 
	mxvalue float(8,2),
	mnvalue float(8,2),
	volume float(18,2),
  PRIMARY KEY (id)
  )";


   $result = $conn->query($query);  
   if (!$result) die ("Database access failed: " . $conn->error); 
  
	$url=array();
		$url['YHOO'] = "http://download.finance.yahoo.com/d/quotes.csv?s=YHOO&f=sl1d1t1c1ohgv&e=.csv";
        $url['GOOG'] =  "http://download.finance.yahoo.com/d/quotes.csv?s=GOOG&f=sl1d1t1c1ohgv&e=.csv";
        $url['MSFT'] = "http://download.finance.yahoo.com/d/quotes.csv?s=MSFT&f=sl1d1t1c1ohgv&e=.csv";
        $url['AMZN'] = "http://download.finance.yahoo.com/d/quotes.csv?s=AMZN&f=sl1d1t1c1ohgv&e=.csv";
        $url['BAC'] = "http://download.finance.yahoo.com/d/quotes.csv?s=BAC&f=sl1d1t1c1ohgv&e=.csv";
            
 $query = "DELETE from live_data";
  $result = $conn->query($query);  
   if (!$result) die ("Database access failed: " . $conn->error); 
  
  foreach($url as $key => $value){
	  $return_data = @file_get_contents($value);
  $parts       = explode("\n", $return_data);
$eachrow='';

  foreach($parts as $row) {
	  
	$eachrow= explode(",", $row);
	
	if(!empty($eachrow)&& array_filter($eachrow)){
	 if(isset($eachrow[1]))$row1 = floatval(str_replace(',', '.', $eachrow[1]));
	
	 if(isset($eachrow[2])) $row2 = $eachrow[2];

		 if(isset($eachrow[3])) $row3=$eachrow[3];
			 if(isset($eachrow[4]))	 $row4 = floatval(str_replace(',', '.', $eachrow[4]));
	 	 if(isset($eachrow[5])) $row5 = floatval(str_replace(',', '.', $eachrow[5]));
	 	 if(isset($eachrow[6])) $row6 = floatval(str_replace(',', '.', $eachrow[6]));
	 	 if(isset($eachrow[7])) $row7 = floatval(str_replace(',', '.', $eachrow[7]));
		 if(isset($eachrow[8])) $row8 = floatval(str_replace(',', '.', $eachrow[8]));
		 
	  $query = "INSERT INTO live_data(id,symbol,lastvalue,date,lcltime,chnge,openvalue,mxvalue,mnvalue,volume) VALUES(NULL,'$key' ,$row1,STR_TO_DATE($row2, '%m/%d/%Y'),$row3,$row4,$row5,$row6,$row7,$row8)"; 
	    
	 $result = $conn->query($query);  
if (!$result) die ("Database access failed: " . $conn->error);
	}
	 
	}
	
  }



?>