<?php include 'dbcon.php'?>
<?php
if(isset($_POST['transfer']))
{
		
	function function_alert($errors) { 
    // Display the alert box  
    echo "<script>alert('$errors');"; 
	echo "window.location.href = 'users.php'";
	echo "</script>";
	}
	  
	session_start();
    $from_id = trim($_POST['fromtc']);
    $to_id = trim($_POST['touser']);
    $credits = trim($_POST['credits']);  
    $error = false;
	
	$from_query = "SELECT * FROM users WHERE id='$from_id'";
	$from_result = mysqli_query($con,$from_query);
	$row_from = mysqli_fetch_assoc($from_result);
	$from_name = $row_from['Name'];
	
	$from_creditdb = $row_from['Credit'];
	

	//Query for user to which credit is transfered
	$to_query = "SELECT * FROM users WHERE id='$to_id'";
	$to_result = mysqli_query($con,$to_query);
    $row_to = mysqli_fetch_assoc($to_result);
    $to_name = $row_to['Name'];
	
	//to user credits
    $to_creditdb = $row_to['Credit'];
	
	 if((int)$credits>(int)$from_creditdb)
    {
        $errors = "Insufficient Credits";
        $error = true; 
    }
	
	if(!$error)
    {
        $current_date = date("Y-m-d H:i:s");
		//from user credits update
        $userf_finalcredit = "UPDATE users SET ";
        $userf_finalcredit .= "Credit = Credit - $credits WHERE id=$from_id";
        $query = mysqli_query($con,$userf_finalcredit);
        
		if(!$query)
        {
            die("QUERY FAILED".mysqli_error($con));
			echo("Error description: " . $mysqli -> error);
        }
		
		//to user credit update
        $userto_finalcredit = "UPDATE users SET ";
        $userto_finalcredit .= "Credit = Credit + $credits WHERE id=$to_id";
        $query = mysqli_query($con,$userto_finalcredit);
	
		//insert into transcations table
        $query1 = "INSERT INTO transferrecord(From_User,To_User,CreditTransfered,DateTime) VALUES('$from_name','$to_name','$credits','$current_date')";
        $res2 = mysqli_query($con,$query1);
		
		
		if($res2){
			
			$user1 = "SELECT * FROM users WHERE id='$from_id' OR id='$to_id'";
			$res=mysqli_query($con,$user1);
			$row_count=mysqli_num_rows($res);
			
		}
		else{
				die("QUERY FAILED".mysqli_error($con));
				echo("Error description: " . $mysqli -> error);
		}
    }
	else{
		function_alert("Insufficient Credit Balance!!Please Try Again");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>
		Final User Result
    </title>
	<link type="text/css" rel="stylesheet" href="css/users1.css" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body{
		background: url('images/building.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  width: 100%
  height: auto;
		
	}
	h6{
		margin-left: 250px;
	}
	h1{	
		color: #ffea30;
		font-size: 22px;
		margin-left: 640px;
		margin-top: -15px;
		font-family: Helvetica;
		color: white;
	}
	#my_table{
		margin-left: 580px;
		font-size: 20px;
		border-style: groove;
		border-collapse: collapse;
		font-family: Helvetica;
		color: black;
		opacity: 0.89;
	}
	th{
		background-color:#1f2128;
		font-family: Helvetica;
		color: white;

	
	}
	th: hover { background-color: #768991; }
	td{
		padding: 15px;
		font-family: Helvetica;
		background-color: #768991;
	}
	.success-msg {
		margin: 10px 10px 10px 10px;
		padding: 10px;
		border-radius: 3px 3px 3px 3px;
		color: black;
		background-color: #768991;
		color: #ffea30;
		font-family: Helvetica;
	}
li {
  float:right;
font-family: Helvetica;
margin-right: 100px;}
ul {
	list-style-type: none;
	margin: -9px;
	padding: 5px 5px;
	overflow: hidden;
	margin-top:13px;
	height: 50px;
margin-right: -100px;
}
	
li a {

  padding: 10px 10px;
color: #1f2128;
  text-decoration: none;
  font-size:23px;
  letter-spacing: 1px;
  font-family: Helvetica;
  margin-left: -100px;
  /*margin-left: 650px;*/
}
p{
	font-size: 26px;
	font-family: serif;
	font-style: oblique;
	letter-spacing: 2px;
	word-spacing: 2px;
	float: left;
	margin-top: -70px;
	margin-left: 62px;
	color: #00FFCC;
	 text-shadow: 1px 0px;
}
li a:hover {
   color: #768991;
}
	</style>
    </head>
	
	<body>

		<ul>

	

	<li><a class="active" href="transferhistory.php"><b>Transfer history</b></a></li>
	<li><a href="Homepage.php"><b>Home</b></a></li>
	</ul>
<hr>
	


	
	
	<br>
		<div class="success-msg" style="margin-top: -50px">
				<i class="fa fa-check"></i>
					Credit is successfully transferred. Check the details below!
		</div>
        <h1><a style="color: #1f2128">User details after credit</a></h1>
        
        <h1><a style="color: #1f2128">transfer</a></h1>
    
	<?php
		echo "<table id=\"my_table\" border='1'>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email Id</th>
		<th>Final Credit</th>
		</tr>";
		
		while($row = mysqli_fetch_assoc($res))
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
		<br><br>
		
	</div>
	</div>
	</body>
</html>