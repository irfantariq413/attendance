<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance Management System</title>
<style>
@font-face {
   font-family: poppins;
   src: url(poppins.woff);
}
body{
    font-family: 'poppins', sans-serif;
	margin: 0;
	padding: 0;
	background-color: ghostwhite;
}
.main{
    width: 90%;
    margin: auto;
}

.nav-area{
    float: right;
    list-style: none;
    margin-top: 30px;
}
.nav-area li{
    display: inline-block;
	
}
.nav-area li a {
color: #fff;
text-decoration: none;
padding: 8px 20px;
font-family: poppins;
background-color: rgba(1,78,115,1.00);
font-size: 18px;
text-transform: uppercase;
	border-radius: 5px;
}
.nav-area li a:hover{
    background-color: rgba(1,98,144,1.00);
    
}
.logo{
    float: left;
	margin-top: 15px;
	color: orange;
	font-size: 40px;
}

.welcome-text{
	position: absolute;
    width: 100%;
    text-align: center;
	margin-top: 15%;
}
.welcome-text h1{
    text-align: center;
    color: rgba(1,78,115,1.00);
    font-size: 60px;
}
/*resposive*/

@media (max-width:600px){

</style>

</head>

<body>
<div class="main">
        <div class="logo">
              LOGO
        </div>
<ul class="nav-area">
<li><a href="login.php">Login</a></li>
<li><a href="regis.php">Signup</a></li>

</ul>
</div>
<div class="welcome-text">
        <h1>User Registration/Login Panel</h1>

    </div>
</body>
</html>