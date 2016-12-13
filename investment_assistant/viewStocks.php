<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/buyStocks.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/viewStocks.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php include_once("inc/header.php");
include_once("checkSession.php");?>
<body>

<div class="container">
  <h2>TRADING STOCKS</h2>
  <p></p>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Symbol</th>
        <th>High</th>
        <th>Low</th>
		<th>Volume</th>
		<th>Price</th>
		<th></th>
      </tr>
    </thead>
	<tbody>
	<?php
	require_once 'login.php';
	 $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
	$query  = "SELECT symbol,mxvalue,mnvalue,volume,lastvalue FROM live_data";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed: " . $conn->error);
    $rows = $result->num_rows;
    
    $count=1;
    for ($j = 0 ; $j < $rows ; ++$j)  {
		
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_NUM);
		
		
	
	?>
    <form action="">
      <tr>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>
		<td><?php echo $row[3];?></td>
		<td><?php echo $row[4];?></td>
		<td><button type="button" class="modalButton" data-toggle="modal" data-src="http://localhost/investment_assistant/graphnew.php?q=<?php echo $count?>" data-width="1000" data-height="600" data-target="#myModal" data-video-fullscreen="">View</button></td>
      </tr>    
</form>	  
	<?php 
	$count++;} ?>
    </tbody>
  </table>
</div>

</body>

	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content" style="width: 1100px;margin-left: -200px;">

				<div class="modal-body">
          
          <div class="close-button">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="embed-responsive embed-responsive-16by9">
					            <iframe class="embed-responsive-item" frameborder="0"></iframe>
          </div>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<?php include_once("inc/footer.php");?>
</html>

