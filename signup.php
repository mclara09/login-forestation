<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body background="https://startupsoasis.com/wp-content/uploads/2020/12/reforestacion-startups-espana-1-1024x445-1.jpg">

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 310px;
		color: white;
		background-color: #2E8428;
		border: none;
		
	}

	#box{

		background-color: #384D23;
		margin: auto;
		width: 300px;
		padding: 20px;
		box-shadow: 10px 5px 5px black;
		
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 30px;margin: 10px;padding: 20px; color: white; text-align: center;">Registrarse</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a style="color: black;padding: 0px 0px 0px 100px;" href= login.php>Regresar a Login</a><br><br>
		</form>
	</div>
</body>
</html>
