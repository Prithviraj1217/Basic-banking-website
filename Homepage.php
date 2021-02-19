<?php include 'dbcon.php'?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="css/home.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body { 
  background: url('images/home5.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  width: 100%
  height: auto;
}
/*h1 {
	font-size: 52px;
	margin-top: 0px;
	margin-left: 700px; 
	
}*/
h2{
	color: #6A4B39;
	letter-spacing: 1px;
	margin-left: 800px;
	margin-top: 40px;
	font-size: 40px;
	font-family: Helvetica;
}
h4{
	font-size: 22px;
	margin-left: 800px;
	letter-spacing: 1px;
	color: #EA7D1A;/*#ffff00;/*#F0FFFF;*/
	text-shadow: 0px 1px;
}
.button1 {
  opacity: 1;
  background-color: #D08D66;/*#00BFFF; /*none*/
  color: none; 
  border: none;
  padding: none;
  margin-top: 200px;
  button:focus { outline: none; }


}

.button1:hover {
  background-color: #6A4B39;/*#4CAF50*/
  color: white;
}
.fixed-footer{
        font-family: Helvetica;
        letter-spacing: 0px;
        font-weight: normal;
        width: 100%;
        position: fixed;        
        background: #2F4F4F;/*#00FFFF;*/
        padding: 10px 0;
        color: white;
		margin-left: -8px;
		height: 20px;
    /*<h1><strong>Bank management</strong></h1>*/}
.fixed-footer{
        bottom: 0;
    }
	.container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
		text-align: center;

    	}

</style>
</head>
<body>

<div class="header">
<br>
<h2 style="font-family: Helvetica">Welcome to Bank management system</h2>  

<h4 style="font-family: Helvetica"><b>Select user to transfer money to another user.<b></h4>
<form action="users.php">
<button class='button1' style="font-family: Helvetica" style="border: none;">View customers</button>
</form>

</div>
</body>
<div class="fixed-footer">


        <div class="container" style="font-family: Helvetica">Copyright &copy; 2021 Bank management system by Prithvi raj

		</div>
    </div>

</html>