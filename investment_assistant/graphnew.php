<?php
# PHPlot Example: OHLC (Financial) plot, Filled Candlesticks plot, using
# external data file, data-data format with date-formatted labels.


require_once 'phplot.php';
include_once("checkSession.php");


 
  

$q=$_GET["q"];
if($q==1)
$query  = "SELECT date,open,high,low,close FROM historic_data where symbol='YHOO'"; 
if($q==2)
$query  = "SELECT date,open,high,low,close FROM historic_data where symbol='GOOG'"; 
if($q==3)
$query  = "SELECT date,open,high,low,close FROM historic_data where symbol='MSFT'"; 
if($q==4)
$query  = "SELECT date,open,high,low,close FROM historic_data where symbol='AMZN'"; 
if($q==5)
$query  = "SELECT date,open,high,low,close FROM historic_data where symbol='BAC'"; 

/*
  Read historical price data from a CSV data downloaded from Yahoo! Finance.
  The first line is a header which must contain: Date,Open,High,Low,Close[...]
  Each additional line has a date (YYYY-MM-DD), then 4 price values.
  Convert to PHPlot data-data data array with empty labels and time_t X
  values and return the data array.
*/
function read_prices_data_data($query)
{
	require_once 'login.php';
   $conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) die($conn->connect_error);
    $result = $conn->query($query); 
  if (!$result) die ("Database access failed: " . $conn->error);
  $rows = $result->num_rows; 
  
  
  for ($j = 0 ; $j < $rows ; ++$j)  { 
  $result->data_seek($j); 
  $row = $result->fetch_array(MYSQLI_NUM);
    // Read the rest of the file and convert.
   
        $data[] = array('', strtotime($row[0]), $row[1], $row[2], $row[3], $row[4]);
    }
    
    return $data;
}

$plot = new PHPlot(1000, 600);
$plot->SetImageBorderType('plain'); // Improves presentation in the manual
if($q==1)
$plot->SetTitle("Yahoo Stock Prices December 2015-2016");
if($q==2)
$plot->SetTitle("Goog Stock Prices December 2015-2016");
if($q==3)
$plot->SetTitle("Microsoft Stock Prices December 2015-2016");
if($q==4)
$plot->SetTitle("Amazon Stock Prices December 2015-2016");
if($q==5)
$plot->SetTitle("Bank of America Stock Prices December 2015-2016");

$plot->SetDataType('data-data');
$plot->SetDataValues(read_prices_data_data($query));
$plot->SetPlotType('lines');
$plot->SetLineWidths(3);
$plot->SetLineStyles('solid');
$plot->SetLegend(array('open','high','low','close'));

$plot->SetDataColors(array('green', 'blue', 'red', 'grey'));
$plot->SetXLabelAngle(90);
$plot->SetXLabelType('time', '%Y-%m-%d');
$plot->SetXTickIncrement(7*24*60*60); // 1 week interval
$plot->DrawGraph();


?>