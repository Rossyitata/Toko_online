<!DOCTYPE html>
<html lang="en">
<head>  
<title>Login Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<body class="img js-fullheight" style="background-image: url('https://evermos.com/home/wp-content/uploads/2021/12/alyssa-strohmann-TS-uNw-JqE-unsplash.jpg');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login Petugas</h2>
				</div>
			</div>
			<div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
					
            <form action="proses_index.php" method="POST"> 
		      		<div class="form-group">
              <label for="varchar" class="form-label">Username</label>
              <input type="varchar" class="form-control" name="username" id="username"  required>
		      		</div>
              
	            <div class="form-group">
              <label for="varchar" class="form-label">password</label>
              <input type="password" class="form-control" name="password" id="password" required>
	            </div><br>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">log In</button>
	            </div>
				<div class="text-right mt-4">
					<a href="tambah_admin.php" class="btn btn-back float-end text-danger">Register</a>
				</div>
	          </form>
	  
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8c873755a90dcdd9","serverTiming":{"name":{"cfExtPri":true,"cfL4":true}},"version":"2024.8.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</html>

