<!doctype html>
<html lang="en">

<head>
	<title>Register</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css"/>

</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
				<div class="row">
					<div class="col-lg-6 col-md-8 mx-auto">

						<!-- form card Register -->
						<div class="card rounded shadow shadow-sm">
							<div class="card-header">
								<h3 class="mb-0">Register</h3>
							</div>
							<div class="card-body">
							<?php if(validation_errors()):?>
								<div class="alert alert-danger" role="alert">
									<?=validation_errors()?>
								</div>
							<?php endif?>
							
							
								<form action="" method="post">
									<div class="form-group">
										<span class="input-group-addon"><i class="fa fa-user"> </i></span>
										<label>Codename</label>
										<div class="input-group">
											<input required type="text" class="form-control" name="nm" placeholder="Name...">
										</div>
									</div>


									<div class="form-group">
										<span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
	                                    <label>Email</label>
										<div class="input-group">
											<input required type="email" class="form-control" name="email" placeholder="Email Address...">
										</div>
									</div>


									<div class="form-group">
									<span class="input-group-addon"><i class="fa fa-user-secret"> </i></span>
                                    <label>Username</label>
										<div class="input-group">
											<input required type="username" class="form-control" name="uname1" placeholder="Username...">
										</div>
									</div>


									<div class="form-group">
											<span class="input-group-addon"><i class="fa fa-key"> </i></span>
                                    <label>Password</label>
										<div class="input-group">
											<input required type="password" class="form-control" name="pwd1" placeholder="Password...">
										</div>
									</div>


									<div class="form-group">
									<span class="input-group-addon"><i class="fa fa-key"> </i></span>
                                    <label>Re-enter Password</label>
										<div class="input-group">
											<input required type="password" class="form-control" placeholder="Confirm Password...">
										</div>
									</div>

									<div class="form-group container">
										<div class="row">
											<div class="col-sm-5">
												<center>
												<!-- <div class="carousel-caption ml-5" style="margin-bottom:-25px;">
													Lecturer
												</div> -->
												<input required type="radio" name="identity" id="lecturer" value="lecturer"/>
												LECTURER
												<!-- <label for="lecturer">
													<img src="<?=base_url()?>assets/images/admin.jpg" height=100px width=180px alt="">
												</label> -->
												</center>
											</div>
											<div class="col-sm-5" style="margin-left:2em;">
												<center> 
												<!-- <div class="ml-6" style="margin-bottom:-25px;">
													Admin
												</div> -->
												<input required type="radio" name="identity" id="admin" value="admin"/>
												ADMIN
												<!-- <label for="admin">
												<img src="<?=base_url()?>assets/images/dosen.jpg" height=100px width=180px alt="">
												</label> -->
												</center>
											</div>
										</div>
									</div>
									<span class="custom-control-description small text-dark">Have an account ?</span>
                                      <a href="<?=base_url();?>">Login</a>

									<button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
								</form>
							</div>

							<!--/card-block-->
						</div>
						<div class="alert alert-info" role="alert">
							<?php 
                            if (isset($pesan)) {
								# code...
                                echo $pesan;
                            }else{
								echo "Input your username and password";
                            }
							?>
						</div>
						<!-- /form card Register -->
					</div>
				</div>
				
				<!--/row-->
			</div>
			<!--/col-->
		</div>
		<!--/row-->
	</div>
	<!--/container-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
</body>

</html>