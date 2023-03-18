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
 if(isset($_SESSION["username"])){
	header("location: index.php");
};
 // var_dump($_POST);
 if(isset($_POST["submit"])){
 
   

     $email = htmlentities($_POST["email"]);
     $name= htmlentities($_POST["userName"]);
     $pass = htmlentities($_POST["pass"]);

     $insert = $conn->prepare("INSERT INTO user (email, username, password) VALUES (:email, :username, :password)");
     $insert->execute([
        ":email" => $email,
        ":username" => $name,
        ":password" => password_hash($pass, PASSWORD_DEFAULT),
     ]);

   
 
 };
 
 ?>
 


<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Login_v1/images/img-02.png" alt="IMG">
				</div>

				<form action="register.php" method="post" class="login100-form validate-form m-auto">
					<span class="login100-form-title">
						Register Now!
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					<input class="inputFix" type="email" name="email" placeholder="Email" required/>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="inputFix" type="text" name="userName" placeholder="Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-user-o" aria-hidden="true"></i>
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
						<button name="submit" value="create" type="submit" class="login100-form-btn">
							Register
						</button>
					</div>

					 <div class="text-center p-t-12">
						<span class="txt1">
							Notice
						</span>
						<a class="txt2" href="#">
							I used free templates for frontend.
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="https://colorlib.com/">
							
							From this website
						</a>
					</div>
				</form>
               
			</div>
		</div>
	</div>
    
	<?php require("includes/footer.php"); ?>