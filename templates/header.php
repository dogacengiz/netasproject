<?php

require_once "config/db_connect.php";

 // Initialize the session
  session_start();
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
//if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['loginButton'])){
 
      $email = trim($_POST["email"]);
      $password = trim($_POST["password"]);
    
    // Validate credentials
    //if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT email, password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            //Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                          
                            
                       
                            header("location: welcome.php");
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    //}
    
    // Close connection
    mysqli_close($mysqli);
  }

 //Search Box
     if (isset($_POST['searchButton'])){ 
    $name = $_POST['searchText'];
    $id = "SELECT id FROM products
    WHERE pname LIKE '{$name}'";

    $result = $mysqli->query($id);
    if(mysqli_num_rows($result) > 0 ){

      $row = mysqli_fetch_assoc($result);
      $p_id =  $row['id'];
      header('Location: product.php?id='.$p_id);
    }
    else {
    header('Location: searchNotFound.php');
    }
  }

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link src="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Organic Shop!</title>
</head>

<body>
<!-- Navbar -->
  <nav id="main-nav" class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="img/logo.png" width="50" height="50" alt="Logo">
        <h3 class="d-inline align-middle">Organic Shop</h3>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarNav" class="collapse navbar-collapse">
        <form action="" method="POST" class="form-inline my-2 my-lg-0">
          <input id="txt-search" name="searchText" type="text" class="form-control mr-sm-2" placeholder="Search here!">
          <button name="searchButton" type="submit" class="btn btn-outline-success my-2 my-sm-0">Go!</button>
        </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#fruit-head-section">Fruits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#veg-head-section">Vegetables</a>
          </li>
          <li class="nav-item">
              <a class="nav-link material-icons" data-toggle="modal" data-target="#modalLoginForm" href="">account_circle</a>
            </li>
          <li class="nav-item">
            <a id="shopcart" class="nav-link" href="shopping-cart.php">
              <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--end navbar-->

  <!--Login-->
  <form action="index.php" method="POST" class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" name="email" id="defaultForm-email" class="form-control validate" placeholder="Your Email" required>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="password" id="defaultForm-pass" pattern=".{6,}" maxlength="12" class="form-control validate" placeholder="Your Password" required>
        </div>
        <a href="createAccount.php">Create new account?</a>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button id="login" name="loginButton" class="btn btn-success">Login</button>
      </div>
    </div>
  </div>
</form>
<div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">
    Login </a>
</div> 
  <!--End Login-->


  