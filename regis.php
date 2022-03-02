<?php 
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup / Royal Trades</title>
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
	p.trade{
		display: block;
		text-align: center;
		margin-left: 0;
		margin-right: 0;
		width: 100%;
		color: white;
		padding: 0;
		font-size: 25px;
		color: green;
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
		margin-left: 9%;
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
		require 'phpmailer/PHPMailerAutoload.php';
		
		
		$username= mysqli_real_escape_string($con, $_POST['username']) ;
		$email= mysqli_real_escape_string($con, $_POST['email']) ;
		$mobile= mysqli_real_escape_string($con, $_POST['mobile']) ;
		$password= mysqli_real_escape_string($con, $_POST['password']) ;
		$cpassword= mysqli_real_escape_string($con, $_POST['cpassword']);
		
		$pass= password_hash($password, PASSWORD_BCRYPT);
		$cpass= password_hash($cpassword, PASSWORD_BCRYPT);
		
		$token = bin2hex(random_bytes(15));
		
		$emailquery= "SELECT * FROM registration where email= '$email'";
		$query= mysqli_query($con, $emailquery);
		
		$emailcount = mysqli_num_rows($query);
		if ($emailcount>0){
			echo "Email already exist. Please try another";
			
		}
		else {
			if ($password === $cpassword){
				
				$insertquery= "insert into registration (username, email, mobile, password, cpassword, token, status) values ('$username', '$email', '$mobile', '$pass', '$cpass', '$token','inactive')";
				
				$iquery= mysqli_query($con, $insertquery);
				
if($iquery){
$mail = new PHPMailer;

$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;		
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'tls'; 
$mail->Username = 'irfantariq413@gmail.com';                 
$mail->Password = 'kotli12345';                          
                           
$mail->setFrom('irfantariq413@gmail.com', 'Irfan Tariq');
$mail->addAddress($_POST['email']);     // Add a recipient
              // Name is optional
$mail->addReplyTo('irfantariq413@gmail.com');
					
	
                   $subject= "Email Verification";
                   $body= "Hi, $username, click here to activate your account. http://localhost/attendance/activate.php?token=$token";
                   $sender_email= "From: irfantariq413@gmail.com"; 

                   if(mail($email, $subject, $body, $sender_email)){
	               $_SESSION['msg']= "Check your email ($email) to activate your account.";
					   header('location:login.php');
                    }
                    else{
                    	echo "Failed to send mail";
                         }
                   
                     }
				else
				{
	                
                     echo "No Inserted";
                    
	
                       }
				
			}else{
	                 echo  "Password are not matching";
                   
			}
		}
		
	}
	
	
	
	
	?>
	
<h1>Royal Trades</h1>
	<p class="trade">*Join the list to be the first to know about our launch*</p>
<div class="register">




<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">

<input type="text" name="username" placeholder="Full Name" required>	<br>
<input type="email" name="email" placeholder="Email Address" required>	<br>
<input type="tel" name="mobile" placeholder="Phone Number" required><br>
<input type="password" name="password" placeholder="Create Password" required><br>
<input type="password" name="cpassword" placeholder="Repeat Password" required>	<br>
<button type="submit" name="submit">Create Account</button>
	
	
</form>
<div>
	<p>Have an Account? <a href="login.php">Login</a></p>
	
</div>
</div>
</body>
</html>