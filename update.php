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
 $id = $_GET["id"];
//  echo $id;

$selectA = $conn->prepare("SELECT * FROM user WHERE id=?");
$selectA->execute([$id]);

$value = $selectA->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["submit"])){

    $id = $_POST["id"];
    $name = htmlentities($_POST["updateName"]);
    $email = htmlentities($_POST["updateEmail"]); 
    
    $update = $conn->prepare("UPDATE user SET email=?, username=? WHERE id=?");
    $update->execute([$email, $name, $id]);
     

    session_start();
    $_SESSION["username"] = $name; // to change update username on navbar
    
    echo "<script> location.replace('index.php'); </script>"; // I have to use javascript bcuz session_start() invoke header error
    

    };
?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Login_v1/images/img-03.png" alt="IMG">
				</div>

				<form action="update.php" method="post" class="login100-form validate-form m-auto">
					<span class="login100-form-title">
						Update
					</span>
                    <input name="id" type="hidden" value="<?= $value['id'] ?>"/>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="inputFix" type="text" value="<?= $value['email'] ?>" name="updateEmail" placeholder="Email" required/>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="inputFix" type="text"  value="<?= $value['username'] ?>" name="updateName" placeholder="Username" required/>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-user-o" aria-hidden="true"></i>
						</span>
					</div>

					<!-- <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password"  name="updatePass" placeholder="Change Password"  required/>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div> -->
					
					<div class="container-login100-form-btn">
						<button name="submit" value="update" type="submit" class="login100-form-btn">
							Update
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="index.php">
							
                        Home
							
						</a>
					</div>
				</form>
               
			</div>
		</div>
	</div>
   
<?php require("includes/footer.php"); ?>