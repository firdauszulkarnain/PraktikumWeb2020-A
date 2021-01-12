<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= BASE_URL ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>css/style-log.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/fontawesome-free/css/all.min.css">
	<title>Login</title>
</head>

<body>
	<header>
		<a href="<?= BASE_URL ?>" class="logo title" style="color: #ce8272 !important; text-decoration:none">findDécor</a>
	</header>
	<div class="container">
		<div class="row justify-content-md-center mt-12">
			<div class="row border-box">
				<div class="col-md-6 p-3" align="center">
					<br><br>
					<img src="<?= URL_IMG ?>svg/undraw_mobile_login_ikmv.svg" width="100%">
				</div>
				<div class="col-md-6 p-5">
					<div class="shadow-lg p-1 mb-0 bg-white rounded">
						<div class="card">
							<div class="text-center">
								<br>
								<h2><b>LOGIN</b></h2><br>
							</div>
							<br />
							<div class="card-body p-3 pb-4">
								<form action="<?= BASE_URL ?>auth/ceklogin" method="post">
									<div class="form-group">
										<label for="input_email" class="label">Email</label>
										<input type="email" class="form-control form " id="email" name="email" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="input_password" class="label">Password</label>
										<input type="password" class="form-control form" id="password" name="password" autocomplete="off">
									</div>
									<button type="submit" class="btn btn-secondary btn-lg btn-block masuk">
										LOGIN
									</button>
									<div class="text-center mt-3">
										<p>Belum Punya Akun? Silahkan<a class="text-dark font-weight-bold" href="<?= BASE_URL; ?>auth/registrasi">
												Registrasi
											</a></p>

									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<p class="text-center">&copy; 2020, Kelompok 5</p>
	</footer>
</body>

</html>