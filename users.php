<?php include 'dbcon.php'?>
<?php

$user = "SELECT * FROM users";
$result=mysqli_query($con,$user);
//echo $result;
//$row_count=mysqli_num_rows($result);



?>


<!DOCTYPE html>
<html>
<head>
   <title>
		ViewUser
    </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/users1.css" >
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
.fixed-footer{
		font-family: Helvetica;
        width: 100%;
        position: fixed;        
        background: #2F4F4F;/*#00FFFF;*/
        padding: 10px 0;
        color: white;
		margin-left: -8px;
		height: 20px;
    }
/*.fixed-footer{
        width: 100%;
        position: fixed;        
        background: #333;
        padding: 10px 0;
        color: #2F4F4F;/*#fff;*/
		/*margin-left: -8px;
		height: 20px;
    }*/
li {
  float:right;

  color: #B52C51;
  margin-left: 100;
}    
li a {
  padding: 25px 25px;
color: #303030;
  text-decoration: none;
  font-size:23px;
  letter-spacing: 1px;
  font-family: Helvetica;
}
li a:hover {
   color: #768991;
}
.button4,.btn1 {
  background-color: #EA7D1A; 
  border: none;
  color: white;
  padding: 12px 26px;
  text-align: center;
  border-radius: 8px;
  font-size: 20px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  opacity: 0.8;
  margin-right: 20px;
  margin-top: -75px;
}
.button1{
  background-color: #ffea30; 
  border: none;
  color: black;
  padding: 4px 18px;
  text-align: center;
  border-radius: 5px;
  display: inline-block;
  font-size: 17px;
  transition-duration: 0.4s;
  cursor: pointer;
  opacity: 1;
  margin-left: 10px;
  font-family: Helvetica;
}

.fixed-footer{
        bottom: 0;
    }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
		text-align: center;
    }
h1{
		font-size: 50px;
		margin-left: 200px;
		margin-top: 60px;
		font-family: Helvitica;
		color: #ececed;

	}
#my_table3 {
	font-family: Helvetica;
	opacity: 0.74;
}

	</style>
    </head>
	
	<body>
	<ul>

	

	<li><a class="active" href="transferhistory.php"><b>Transfer history</b></a></li>
	<li><a href="Homepage.php" style="font-family: Helvetica"><b>Home</b></a></li>
	</ul>
<hr>

	
	<br>
        <h1><centre><a style="font-family: Helvetica"><b>User details</b></a></centre></h1>
	<?php
		echo "<table id=\"my_table3\" border='1'>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email address</th>
		<th>Balance</th>
		<th></th>
		</tr>";
		//un-comment the below lines for database operations!!
		while($row = mysqli_fetch_assoc($result))
		{
		echo "<tr>";
		echo "<td>" . $row['Id'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Email'] . "</td>";
		echo "<td>" . $row['Credit'] . "</td>";
		//echo "<td><input class='button1' type='submit' value='View'/></td>";
		echo "<td><a class='text-white' href='viewuser.php?Id= ".$row['Id']." '><button class='button1'>Transfer money</button></a></td>";
		echo "</tr>";
		}
		echo "</table>";
	?>
		<br><br>
		
	</div>

    </div>

	</div>

	<br><br>
	</body>
<div class="fixed-footer">
        <div class="container">Copyright &copy; 2021 Bank management system
		
		</div>
</html>
