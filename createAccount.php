<?php
require_once "config/db_connect.php";

//send data from contact form to users database
 
// Define variables and initialize with empty values
$name = $email = $phone = $password ="";
$name_err = $email_err = $phone_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Email is required";
      } elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Please enter a valid email.";
      } else{
          $email =$input_email; 
      }

    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter a phone number.";        
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Please enter a valid phone number.";
    } else{
        $phone = $input_phone;
    }
    
    // Validate password and check two passwords are same
    $input_password = trim($_POST["password"]);
    $input_cpassword = trim($_POST["cpassword"]);
        if(empty($input_password)) {
            $password_err ="Please enter a password";
        }
        elseif($input_password != $input_cpassword) {
            $password_err ="Passwords are not same!";
        }
        elseif (strlen($input_password) <= '8') {
            $password_err = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$input_password)) {
            $password_err = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$input_password)) {
            $password_err = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$input_password)) {
            $password_err = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }else{
            $password = $input_password;
        }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($phone_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_name, $param_email, $param_phone, $param_password);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    <!--iused this website for desgin -> https://bootsnipp.com/snippets/z8699-->

    <div class=" ">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p>
                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <!---contact form-->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group input-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                 </div>
                <input name="name" class="form-control" placeholder="Name & Surname" type="text" value="<?php echo $name;?> ">
                <span class="help-block"><?php echo $name_err;?></span>
            </div> <!-- form-group// -->
            <div class="form-group input-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                 </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo $email;?>">
                <span class="help-block"><?php echo $email_err;?></span>
            </div> <!-- form-group// -->
            <div class="form-group input-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="Phone number" type="text" value="<?php echo $phone;?>">
                <span class="help-block"><?php echo $phone_err;?></span>
            </div> <!-- form-group// -->
            <div class="form-group input-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="password"class="form-control" placeholder="Create password" type="password" value="<?php echo $password;?>">
                <span class="help-block"><?php echo $password_err;?></span>
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="cpassword" class="form-control" placeholder="Repeat password" type="password">
            </div> <!-- form-group// -->                                      
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block" value="Create Account">
            </div> <!-- form-group// -->      
            <p class="text-center">Have an account? <a href="" data-toggle="modal" data-target="#modalLoginForm">Log In</a> </p>                                                                 
        </form>
        <!--end contact form-->
        </article>
        </div> 
        </div> 



    <?php include('templates/footer.php');?>
    
</html>
</body>
</html>