<?php
include '../includes/config.php';
session_start();


error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"] === 'POST'){
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  echo "<script>console.log('$email')</script>";
  echo "<script>console.log('$password')</script>";

  //check if fields are empty
  if(empty($email)||empty($password)){
    die("Don't leave any field empty");
  }

  $query = 'SELECT user_id,last_name,password_hash, role FROM apl_users WHERE email = ?';
  $stmt = $conn -> prepare($query);
  $stmt->bind_param('s',$email);
  $stmt->execute();
  $results = $stmt -> get_result();

  if($results -> num_rows > 0){
      //ideally you would have looped through it but because we know it is just one record in the db that is why we do this.
      $row = $results -> fetch_assoc();
      $user_id = $row['user_id'];
      $lastname = $row['last_name'];
      $user_password = $row['password_hash'];
      $user_role = $row['role'];
      // echo "<script>alert($lastname)</script>";
      // echo $user_id;
      // $_SESSION['id'] = $user_id;
      // $_SESSION['role'] = $user_role;
      // $_SESSION['name'] = $lastname;
      // echo "<script>console.log('$user_role')</script>";
      // if ($user_role == 'admin'){
      //   header("Location: ../views/admin/dashboard.php");
      // }elseif($user_role == 'user'){
      //     header("Location: ../views/users/dashboard.php");
      // }else{
      //     header("Location: login.php");
      // }
      // exit();




      if (password_verify($password, $user_password)){
          $_SESSION['id'] = $user_id;
          $_SESSION['role'] = $user_role;
          $_SESSION['name'] = $lastname;
          if ($user_role === 'admin') {
            echo "<script>alert('Redirecting to admin dashboard');</script>";
            header("Location: ../views/admin/dashboard.php");
          } elseif ($user_role ==='user') {
              echo "<script>alert('Redirecting to user dashboard');</script>";
              header("Location: ../views/users/dashboard.php");
          } else {
              echo "<script>alert('Redirecting to login page - Invalid role');</script>";
              header("Location: login.php");
          }
          exit();
      }else{
        echo "<script> alert('Incorrect password') </script>";
      }
  }else {
      // Show an alert if the user is not registered
      echo '<script>alert("User not registered.");</script>';
  }
  $stmt -> close();
}
$conn -> close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APL Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <form action="login.php" method="POST">
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="email" id="email" name="email" class="form-control form-control-lg mb-5" placeholder="EMAIL" required/>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="PASSWORD" required/>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="login.php">Forgot password?</a></p>

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>
              </form> 

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="signup.php" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
