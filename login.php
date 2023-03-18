
<?php require("includes/header.php"); ?>
<style>
	.inputFix {
  font-family: Poppins-Medium;
  font-size: 15px;
  line-height: 1.5;
  color: #666666;

  display: block;
  width: 100%;
  background: #e6e6e6;
  height: 50px;
  border-radius: 25px;
  padding: 0 30px 0 68px;
}

</style>
<?php require("connection.php"); ?>

<?php

if (isset($_SESSION["username"])) {
	echo "<script> location.replace('index.php'); </script>"; // url bar ကနေ၀င်မှာဆိုးလို့ပါ if session already isset goto homepage 
	// to prevent entering login page 
  };   

if(isset($_POST["submit"])){
 
	
 // var_dump($_POST);

$email = htmlentities($_POST["email"]);
$pass = htmlentities($_POST["pass"]);

$login = $conn->prepare("SELECT * FROM user WHERE email = ?"); // get from database

$login->execute([$email]);

$data = $login->fetch(PDO::FETCH_ASSOC);  // fetch assoc array data

if($login->rowCount() > 0){
 // echo $login->rowCount();

   if(password_verify($pass, $data["password"])){

	 $_SESSION["username"] = $data["username"];
	 $_SESSION["email"] = $data["email"];
	 $_SESSION["id"] = $data["id"]; 

	 header("location: index.php");


   } else {
	$int = 1;
	
   };

} else {
	// echo "<script>
	// $('#notification').show();
	// </script>";
	$int = 1;
}



};

?>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Login_v1/images/img-01.png" alt="IMG">
				</div>

				<form method="post" action="login.php" class="login100-form validate-form">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="inputFix" type="email" name="email" placeholder="Email" required/>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="inputFix" type="password" name="pass" placeholder="Password" required/>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="submit" type="submit" value="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Create your Account
							<i class="bi bi-person m-l-5"></i>
						</a>
					</div>
					<?php if(isset($int) && $int == 1) : ?>
					<div id="notification" class="alert alert-danger text-center">email or password is wrong
</div>
						<?php endif ; ?>
				</form>
			</div>
		</div>
	</div>
	

    <?php require("includes/footer.php"); ?>

	

