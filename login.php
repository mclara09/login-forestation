
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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<h1>Forestation Tracker</h1>
	<title>Login</title>
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
			<div style="font-size: 30px;margin: 10px; padding: 20px;color: white; text-align: center;">Bienvenidos</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a style= "color: black;padding: 0px 0px 0px 115px;"href= signup.php>Registrarse</a><br><br>
		</form>
	</div>
</body>
</html>