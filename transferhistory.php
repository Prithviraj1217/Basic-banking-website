<?php include 'dbcon.php'?>
<?php
$query = "SELECT * FROM transferrecord";
$result = mysqli_query($con,$query);

?>

<html>
<head>
<title>
Transfer history
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="css/viewuser1.css" >
<style>
body { 
  background: url(../images/building.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
	#my_table3{
		margin-left: 290px;
		font-size: 20px;
		width: 700px;
		border-style: groove;
		border-collapse: collapse;
		background-color: #effbf7;
		opacity: 0.89;

	}

	#my_table3 tr:hover {background-color: #768991;}
	th{
		background-color:#1f2128;
		color:#ffea30;
	
	}
	tr{
		background-color: #1f2128;
		color: white;
	}
	th,td{
		padding: 11px;
		text-align: center;
		font-family: Helvetica;
	}


.fixed-footer{
        width: 100%;
        position: fixed;        
        background: #2F4F4F;/*#00FFFF;*/
        padding: 10px 0;
        color: white;
		margin-left: 0px;
		height: 20px;
    }
.fixed-footer{
        bottom: 0;
    }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
		text-align: center;
		font-family: Helvetica;

    }
/*.fixed-footer{
        width: 100%;
        position: fixed;        
        background: #333;
        padding: 10px 0;
        color: #fff;
		margin-left: -8px;
		height: 20px;
    }
.fixed-footer{
        bottom: 0;
    }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
		/*text-align: center;
    }*/
h1{
margin-left: 500px;
color:black;
}


.login-form img{
	width: 545px;
	height:300px;
	position:relative;
	margin-top:0px;
	margin-left: 35px;
}
.button1, .btn1{
  background-color: #303030; 
  padding: 12px 26px;
  text-align: center;
  border-radius: 8px;
  font-size: 20px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  /*cursor: pointer;*/
  opacity: 1;
  margin-right: 20px;
  margin-top: -75px;
  font-family: Helvetica;
}
.container1 .btn1 {
  background-color: white;
  position: absolute;
  color: #768991;
  margin-left: -90px;
  margin-top: 40px;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  color:none;
  font-size: 20px;
  padding: 12px 24px;
  border: none;
  /*cursor: pointer;*/
  border-radius: 10px;
  text-align: center;
}


.btn1:hover {
	 background-color: #768991;
	color: white;
}
</style>
</head>
<body>
	
	 
	
	<div class="container1">
		<p align='right'>
	<button class='btn1' onclick="redirect()">Back</button>
	</p>
	<script>
	function redirect() {
		window.location.href = "users.php";
	}
	</script>
	<br>
<br>
	    <form method="GET">
		

		
		<div class="head">
			<h1><a style="font-family: Helvetica"><b>Transfer history</b></a></h1>
			<?php
				
				echo "<table id=\"my_table3\" border='1'>
				<tr>
				<th>Id</th>
				<th>From User</th>
				<th>To User</th>
				<th>Credit Amount<br>Transfered</th>
				<th>Date & Time</th>
				</tr>";

				while($row = mysqli_fetch_array($result)) 
				{
				echo "<tbody>";
				echo "<tr>";
				echo "<td>" . $row['Id'] . "</td>";
				echo "<td>" . $row['From_User'] . "</td>";
				echo "<td>" . $row['To_User'] . "</td>";
				echo "<td>" . $row['CreditTransfered'] . "</td>";
				echo "<td>" . $row['DateTime'] . "</td>";
				echo "</tr>";
				echo "</tbody>";
				}
				echo "</table>";
			?>
		</div>
		<br><br><br>
	</div>
	</div>
	<br><br>
</body>
<div class="fixed-footer">
        <div class="container">Copyright &copy; 2021 Bank management system 
		
		</div>
    </div>
</html>