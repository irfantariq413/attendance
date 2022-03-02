<?php 
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login / Royal Trades</title>
<link rel="icon" type="image/png" href="img/logo2.png">

<style>
	body{
		margin: 0;
		padding: 0;
		background-color: #180D36;
	}
	
	h1{
		display: inline-block;
		text-align: center;
		color: #F9D203;
		font-size: 80px;
		padding: 0;
		margin-top: 1%;
		margin-bottom: 1%;
		margin-left: 0;
		margin-right: 0;
		width: 100%;
		
		
	}
	h2{
		color: white;
		margin-left: 4%;
	}
	
	div.register{
		margin-left: 38%;
		margin-top: 1%;
	
		
	}
	input{
	margin-bottom: 0px;
		margin-top: 10px;
		padding: 11px;
		border-radius: 8px;
		border: none;
		width: 300px;
		font-size: 20px;
	}
	button{
		margin-bottom: 0px;
		margin-top: 10px;
		padding: 11px;
		border-radius: 8px;
		border: none;
		width: 200px;
		font-size: 17px;
		margin-left: 7%;
		background-color: green;
	}
	button:hover{
		cursor: pointer;
	}
	p{
		color: white;
		font-size: 17px;
		margin-left: 4%;
	}
	a{
		text-decoration: none;
		color: green;
		font-size: 20px;
	}
	div p.mail{
		color: red;
		font-size: 17px;
		margin-left: 0%;
		width: 35%;
	}
	
	</style>

</head>

<body>

<?php 
	
	include 'dbcon.php';
	
	if (isset($_POST['submit'])){
		$email= $_POST['email'];
		$password= $_POST['password'];
		
		
		$email_search = "SELECT * from registration where email='$email' and status='active' ";
		$query = mysqli_query($con, $email_search);
		$email_count = mysqli_num_rows($query);
		
		
		
		        
		
		
		if ($email_count){
			$email_pass= mysqli_fetch_assoc($query);
			
			$db_pass= $email_pass['password'];
			$_SESSION['username']= $email_pass['username'];
			
			    $line= "Select * from registration where email='$email' and status='active'";
	        	$linee= mysqli_query($con,$line);
		        $lineee = mysqli_fetch_assoc($linee);
		        $_SESSION['lin']= $lineee['id'];
		
	
			$pass_decode= password_verify($password, $db_pass);
			if ($pass_decode){
				
				echo "Login Successfully";
				?>
				<script>
	location.replace("home.php");
	
	</script>
				
				
				<?php
				
				
				
			}else {
				echo "Password incorrect";
			}
		}else {
			
			echo "Invalid email";
		}
	}

?>

<h1>Royal Trades</h1>
	
<div class="register">
<h2>Login to your Account</h2>

<div>
	<p class="mail"> <?php 
		if (isset($_SESSION['msg'])){
		
		echo $_SESSION['msg'];
		}
		else {
			echo $_SESSION['msg']="You are logged out. Please login";
			
			
		};    ?>  </p>
	
</div>



<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
	
	<input type="email" name="email" placeholder="Enter Email Address" required> <br>
	
	<input type="password" name="password" placeholder="Enter Password" required> <br>
	
	<button type="submit" name="submit">Login</button>
	
	
</form>

<div>
	<p>Not have an Account? <a href="regis.php">Signup here</a></p>
	
</div>
</div>
</body>
</html>