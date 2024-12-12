<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-2 mt-md-2 pb-2">

              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>

              <div data-mdb-input-init class="form-outline form-white mt-4 mb-4">
                <input type="text" id="fname" class="form-control form-control-lg mb-5" placeholder="FIRST NAME" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="text" id="lname" class="form-control form-control-lg mb-5" placeholder="LAST NAME" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="email" id="email" class="form-control form-control-lg mb-5" placeholder="EMAIL" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="password" id="password" class="form-control form-control-lg mb-5" placeholder="PASSWORD" />
                
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="password" id="cpassword" class="form-control form-control-lg mb-5" placeholder="CONFIRM PASSWORD" />
              </div>

              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>

            </div>

            <div>
              <p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Sign In</a>
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
