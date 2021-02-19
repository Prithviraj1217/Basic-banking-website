<?php include 'dbcon.php'?>

<html>
<head>
<title><a style="font-family: Helvetica">Transfer credit</a></title>
<style>


#my_table1{
		margin-left: 30px;
		font-size: 19px;
		width: 480px;
		border-collapse: collapse;
		text-align: center;
		font-family: Helvetica;
		background-color: #b52c51;
		opacity: 0.74;

		
	}
	td{
		
		padding: 9px;
		font-size: 18px;
		font-family: Helvetica;
	}
	th{
		
		padding: 8px;
		font-size: 20px;
		font-family: Helvetica;
		background-color: #6D9773;
	}
h1
{
color:#ffea30;
font-family: Helvetica;
margin-top: 65px;
margin-left: -800px;
}
h2
{
color: white;
font-family: Helvetica;
margin-left: 400px;

}
select{

color: black;
font-family: Helvetica;
margin-left: -100px;

}
option{
	margin-left: 0px;
}

.button2 {
	background-color: #ffea30;
	color: black;
	opacity: 1;
	margin-top: 200px: 
	margin-left: 300px;
}
.button2:hover {
	background-color: #768991;
	
}

.center {
    text-align: center;
    
    color: black;
    width: auto;
    height: 50px;
    margin-right: -470px;
}


.container { 
  height: 200px;
  position: relative;
color:black;
  
}

.center1 {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.center2 {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-left: -880px;

  
}
.button1 {
	background-color: #b52c51;
	color: white;
}
	

</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="css/viewuser1.css" >
</head>

<body> 
 
	<?php

	if(isset($_GET['Id'])) 
	{   
    //Session Start
	session_start();	
	$_SESSION['Id'] = $_GET['Id'];
	}
	?>
	
	<div class="container1">
	<p align='right'>
<br>
<br>
<br>
<br>
<br>
	<button class='button1' onclick="redirect()"style="font-family: Helvetica">Back</button>
	</p>
	<script>
	function redirect() {
		window.location.href = "users.php";
	}
</script>
	<?php
	if(isset($_GET['errors'])){
		$error=$_GET['errors'];
		echo "<div class='alert alert-danger'>
            $error</div>";
			
	}
	if(isset($_GET['success'])){
		$success= $_GET['success'];
		echo "<div class='alert alert-success'>
           $success</div>";
	}?>
	
	    <form method="POST" action="transfercredit.php">
		
		
		
			<?php
				$txt = $_GET['Id'];
				$result = mysqli_query($con,"SELECT * FROM users where Id=" . $txt);
				echo "<table id=\"my_table1\" border='1'>
				<tr>
				<th>Id</th>
				<th>Recipient name</th>
				<th>Email</th>
				<th>Current balance</th>
				</tr>";

				while($row = mysqli_fetch_array($result)) 
				{
				echo "<tr>";
				echo "<td>" . $row['Id'] . "</td>";
				echo "<td>" . $row['Name'] . "</td>";
				echo "<td>" . $row['Email'] . "</td>";
				echo "<td>" . $row['Credit'] . "</td>";
				echo "</tr>";
				}
				echo "</table>";
			?>

		<div class="head">
			<h1 style="text-align:center;" style="font-family: Helvetica">Select donor from below list:</h1>	
			
<div class="center">
			<select class="form-control" required name="touser" id="listu1" style="margin-left: -1200px">
			<option value="" style="font-family: Helvetica">Select Users</option>
			<button class='button2' name='transfer' onclick="myfunction()" style="font-family: Helvetica">Transfer amount</button>
                <?php
				   // var $space = " ";
					$txt = $_GET['Id'];
                    $query = "SELECT * FROM users where Id!='".$txt."'";
                    $result = mysqli_query($con,$query);

                    while($row = mysqli_fetch_array($result))
                    {?>
                    <option value="<?php echo $row['Id'];?>"><?php echo $row['Name']; echo " "; echo " - "; echo $row['Credit'];?></option>
					<?php
                    }
				?>
            </select>
		</div>
	<div class="center2">

			<h2 style="text-align:center;" style="font-family: Helvetica"><b>Amount</b></h2>
			<br>
			<input type="text" id="amt" name="credits" required="required">
			<input name="fromtc" type="hidden" value="<?php echo $txt;?>">
			<br>
			
			</form>	
</div>
<button class='button2' name='transfer' onclick="myfunction()" style="font-family: Helvetica">Transfer amount</button>
		
			<br><br><br>

			<!--<script>
			function myfunction(){
				alert();
			}
			</script>-->

		</div>
	</div>
	</div>
	<br>
	    
</div>

</body>
</html>